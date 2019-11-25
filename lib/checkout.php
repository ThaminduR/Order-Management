<?php
include("dbconnection.php");

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
$sql2 = "SELECT prod_id,qty FROM tbl_cart WHERE cus_id='$cus_id';";
$results = mysqli_query($conn, $sql2);
$nor = $results->num_rows;

if ($nor == 0) {
    echo ("No Items Are selected ! ");
    header("location:../cart.php");
} else {
    //Iterate through the cart and add items to the order_product table
    for ($x = 0; $x <= $nor; $x++) {
        $rec = $results->fetch_assoc();
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
$sql5 = "INSERT INTO order_track()";

//adding invoice





//emptying the cart of the user
$result1 = mysqli_query($conn, "DELETE FROM tbl_cart WHERE cus_id='$cus_id';");
echo ("Wait until processing is done");

echo ("<br>");
echo ("Done !");
header("refresh:3;url=../index.php");
