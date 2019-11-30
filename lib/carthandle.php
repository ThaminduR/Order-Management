<?php
require_once("dbconnection.php");

if (isset($_GET["type"])) {
	$type = $_GET["type"];
	$type();
}

// get cart products start
function getCart($cus_id)
{
	$conn = DBConnection::connectDB();

	$sql = "SELECT tbl_product.prod_id,tbl_product.prod_name, tbl_cart.qty, tbl_cart.price FROM tbl_product INNER JOIN tbl_cart ON tbl_product.prod_id = tbl_cart.prod_id WHERE tbl_cart.cus_id='$cus_id' ;";
	$result = $conn->query($sql);
	$output = "<tr value='prod_name'></tr>";
	$rows = $result->num_rows;
	if ($rows > 0) {
		while ($rec = $result->fetch_assoc()) {
			$output .= "<tr><td>" . $rec["prod_name"] . "</td><td>" . $rec["qty"] . "</td><td>" . $rec["price"] . "</td><td><input type='hidden' class='product' value='" . $rec["prod_id"] . "'><i class='fa fa-times remove' aria-hidden='true'></i></td></tr>";
		}


		echo $output;
		$conn->close();
	}
}

function getWish($cus_id)
{
	$conn = DBConnection::connectDB();

	$sql = "SELECT tbl_product.prod_id,tbl_product.prod_name, tbl_wishlist.qty, tbl_wishlist.price FROM tbl_product INNER JOIN tbl_wishlist ON tbl_product.prod_id = tbl_wishlist.prod_id WHERE tbl_wishlist.cus_id='$cus_id' ;";
	$result = $conn->query($sql);
	$output = "<tr value='prod_name'></tr>";
	$rows = $result->num_rows;
	if ($rows > 0) {
		while ($rec = $result->fetch_assoc()) {
			$output .= "<tr><td>" . $rec["prod_name"] . "</td><td>" . $rec["qty"] . "</td><td>" . $rec["price"] . "</td><td><input type='hidden' class='product' value='" . $rec["prod_id"] . "'><i class='fa fa-times remove' aria-hidden='true'></i></td></tr>";
		}
		echo $output;
		$conn->close();
	}
}

function getOrder($cus_id)
{
    $conn = DBConnection::connectDB();

    $sql = "SELECT order_id, order_dot,product_id,qty FROM (tbl_order NATURAL JOIN order_product) WHERE tbl_order.cus_id=$cus_id";;
    $result = $conn->query($sql);
    $output = "<tr value='order_id'></tr>";
    $rows = $result->num_rows;
    if ($rows > 0) {
        while ($rec = $result->fetch_assoc()) {
            $output .= "<tr><td>" . $rec["order_id"] . "</td><td>" . $rec["order_dot"] . "</td><td>" .  $rec["product_id"] . "</td><td>" . $rec["qty"] . "</td></tr>";
        }


        echo $output;
        $conn->close();
    }
}


// Count all notification Start
function CountCart($cus_id)
{
	$conn =  DBConnection::connectDB();
	// $cusid=$_POST['cus_id']
	$table = 'tbl_cart';
	$sql = "SELECT  count(*) FROM $table WHERE cus_id='$cus_id';";
	$result = $conn->query($sql);

	if ($conn->errno) {
		echo ("SQL Error : " . $conn->error);
		exit;
	}
	$rec = $result->fetch_array();
	echo ($rec[0]);
	$conn->close();
}

function Total($cus_id)
{
	$conn =  DBConnection::connectDB();
	$table = 'tbl_cart';
	$sql = "SELECT  SUM(price) FROM $table WHERE cus_id='$cus_id';";
	$result = $conn->query($sql);

	if ($conn->errno) {
		echo ("SQL Error : " . $conn->error);
		exit;
	}
	$rec = $result->fetch_array();
	return ($rec[0]);
	$conn->close();
}

function DeleteCartItem()
{
	$prod_id = $_POST['product'];
	$cus_id = $_POST['cus_id'];

	$conn =  DBConnection::connectDB();
	$sql = "DELETE FROM tbl_cart WHERE prod_id = ? AND cus_id = ? ";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss", $prod_id, $cus_id);

	if (!$stmt->execute()) {
		echo ("0,SQL Error : " . $stmt->error);
	} else {

		echo ("1,Successfully Removed!");
	}
	$stmt->close();
	$conn->close();
}

function DeleteWishItem()
{
	$prod_id = $_POST['product'];
	$cus_id = $_POST['cus_id'];

	$conn =  DBConnection::connectDB();
	$sql = "DELETE FROM tbl_wishlist WHERE prod_id = ? AND cus_id = ? ";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss", $prod_id, $cus_id);

	if (!$stmt->execute()) {
		echo ("0,SQL Error : " . $stmt->error);
	} else {

		echo ("1,Successfully Removed!");
	}
	$stmt->close();
	$conn->close();
}
// Count all notification End
