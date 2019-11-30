<?php


include("dbconnection.php");
require('carthandle.php');
require('../invoice/invoice.php');

$conn = DBConnection::connectDB();
session_start();

// Redirect if user is not logged in

if (!isset($_SESSION['cus_info'])) {
    header("location:../index.php");
}

// Add order to order table

$sql = "SELECT order_id FROM tbl_order ORDER BY order_id DESC LIMIT 1;";
$resultid = mysqli_query($conn, $sql);

$nor = $resultid->num_rows;

if ($nor == 0) {
    $newid = "ORD00001";
} else {
    $rec = $resultid->fetch_assoc();
    $lastid = $rec["order_id"];
    $num = substr($lastid, 3);
    $num++;
    $newid = "ORD" . str_pad($num, 5, "0", STR_PAD_LEFT);
}

$cus_id = $_SESSION['cus_info']['cus_id'];

$date  = date("Y-m-d");

$result2 = mysqli_query($conn, "INSERT INTO tbl_order(order_id,order_dot,cus_id) VALUES('$newid','$date','$cus_id');");


//Add details to the order_product table
$sql2 = "SELECT prod_id,qty,price FROM tbl_cart WHERE cus_id='$cus_id';";
$sql2_c = "SELECT prod_name,qty,price FROM tbl_cart NATURAL JOIN tbl_product WHERE cus_id='$cus_id';";
$results_cart = mysqli_query($conn, $sql2);
$nor_cart = $results_cart->num_rows;
$results_c = mysqli_query($conn, $sql2_c);
if ($nor_cart == 0) {
    echo ("No Items Are selected ! ");
    header("location:../cart.php");
} else {
    //Iterate through the cart and add items to the order_product table
    for ($x = 0; $x <= $nor_cart; $x++) {
        $rec = $results_cart->fetch_assoc();
        $product_id = $rec['prod_id'];
        $qty = $rec['qty'];
        $result3 = mysqli_query($conn, "INSERT INTO order_product(order_id,product_id,qty) VALUES('$newid','$product_id','$qty');");
    }
}

//Add delivery details

$sql3 = "SELECT deliver_person_id FROM tbl_deliveryemp;";
$resultid2 = mysqli_query($conn, $sql3);
$rec = $resultid2->fetch_assoc();

$del_per_id = $rec['deliver_person_id'];

$sql4 = "SELECT deli_id FROM tbl_delivery ORDER BY deli_id DESC LIMIT 1;";
$resultid3 = mysqli_query($conn, $sql4);

$nor = $resultid3->num_rows;

if ($nor == 0) {
    $newid2 = "DEL00001";
} else {
    $rec = $resultid3->fetch_assoc();
    $lastid = $rec["deli_id"];
    $num = substr($lastid, 3);
    $num++;
    $newid2 = "DEL" . str_pad($num, 5, "0", STR_PAD_LEFT);
}


//calculating estimate delivery date 
$e_date =  date('Y-m-d', strtotime("+7 day"));

$result4 = mysqli_query($conn, "INSERT INTO tbl_delivery(deli_id,order_id,deliver_person_id,deli_estimate_date) VALUES('$newid2','$newid','$del_per_id','$e_date')");

//adding delivery status
$sql5 = "INSERT INTO tbl_order_track(deli_id,track_status,date) VALUES('$newid2','Dispatched','$date');";
$result5 = mysqli_query($conn, $sql5);




//invoice id generate
$cdate = date("Y-m-d", time());
$sql_ = "SELECT count(inv_id) FROM tbl_invoice WHERE inv_date='$cdate';";

$result_ = $conn->query($sql_);

if ($conn->errno) {
    echo ("SQL Error : " . $conn->error);
    exit;
}
$row = $result_->fetch_array();
$count = $row[0];
$count++;

$newid_ = "INV" . str_replace("-", "", $cdate) . "_" . str_pad($count, 4, "0", STR_PAD_LEFT);


//adding invoice
$time = date("h:i:s", time());
$gtot = Total($cus_id);
$discount = '0'; //no discount
$ntot = $gtot;
$oper = 'Online';

$sql_inv = "INSERT INTO tbl_invoice(inv_id,inv_date,inv_time,inv_gtot,inv_ntot,inv_discount,inv_operator) VALUES('$newid_','$date','$time','$gtot','$ntot','$discount','$oper');";
$result_inv = mysqli_query($conn, $sql_inv);

//reducing from stock
$sql_st = "SELECT prod_id,qty FROM tbl_cart WHERE cus_id='$cus_id';";
$result_st = mysqli_query($conn, $sql_st);
$nor = $result_st->num_rows;

if ($nor == 0) {
    echo ("No Items Are selected ! ");
    header("location:../cart.php");
} else {
    //Iterate through the cart and reduce items in batch table
    for ($x = 0; $x <= $nor; $x++) {
        $rec = $result_st->fetch_assoc();
        $product_id = $rec['prod_id'];
        $qty = $rec['qty'];
        $result_tmp = mysqli_query($conn, "SELECT bat_qty_rem FROM tbl_batch WHERE prod_id='$product_id';");
        $result_temp2 = mysqli_query($conn, "SELECT prod_qty FROM tbl_product WHERE prod_id='$product_id';");
        $record = $result_tmp->fetch_assoc();
        $record2 = $result_temp2->fetch_assoc();
        $amount = $record['bat_qty_rem'];
        $amount2 = $record2['prod_qty'];

        $new_am = $amount - $qty;
        $new_am2 = $amount2 - $qty;

        $result_final = mysqli_query($conn, "UPDATE tbl_batch SET bat_qty_rem = '$new_am' WHERE prod_id='$product_id';");
        $result_final2 = mysqli_query($conn, "UPDATE tbl_product SET prod_qty = '$new_am2' WHERE prod_id='$product_id';");
    }
}


//emptying the cart of the user
$result1 = mysqli_query($conn, "DELETE FROM tbl_cart WHERE cus_id='$cus_id';");

header("refresh:500;url=../index.php");
genInvoice($gtot, $nor_cart, $results_c, $newid);

$to_email = "thamindu.randil@gmail.com";
$subject = "Stylish Delivery";
$body = "The order '$newid' has been assigned to you";
$headers = "From: Stylish";

// if (mail($to_email, $subject, $body, $headers)) {
//     echo ("Email successfully sent to Delivery Person");
// } else {
//     echo ("Email sending failed ");
// }
// echo ("Wait until processing is done");
// echo ("<br>");
// echo ("Done !");

