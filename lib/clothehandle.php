<?php
include("dbconnection.php");

// if(isset($_GET["type"])){ 
// 	$type = $_GET["type"];
// 	$type();
// 	}
// function SelectImages(){
// 	$conn= DBConnection::connectDB();
// 	$sql= "SELECT  tbl_pro_images.img_name, tbl_cart.qty, tbl_cart.price,  FROM tbl_pro_images INNER JOIN tbl_cart ON tbl_pro_images.prod_id = tbl_cart.pro_id WHERE tbl_cart.cus_id='CUS00002'";
// 	$result = $conn->query($sql);
// $output = 
// }


/*
SELECT tbl_pro_images.img_id, tbl_product.prod_brand_name, tbl_pro_images.img_name, tbl_product.prod_qty, tbl_product.prod_rlevel, tbl_product.prod_status FROM tbl_product INNER JOIN tbl_pro_images ON tbl_product.prod_id = tbl_pro_images.pro_id WHERE tbl_product.sub_cat_id='SUB00001'
*/
if (isset($_POST['isAddWish'])) {
	$conn = DBConnection::connectDB();

	$product_id = $_POST['product_id'];
	$cus_id = $_POST['cus_id'];
	$qty = $_POST['qty'];

	$product_details = $conn->query("SELECT prod_price FROM tbl_product WHERE prod_id='$product_id'");
	$product_price = $product_details->fetch_assoc();

	$price = $product_price['prod_price'] * $qty;

	if ($conn->query("INSERT INTO tbl_wishlist VALUES('$cus_id', '$product_id', $qty, $price)")) {
		echo true;
	} else {
		echo false;
	}
}
if (isset($_POST['isAddCart'])) {
	$conn = DBConnection::connectDB();

	$product_id = $_POST['product_id'];
	$cus_id = $_POST['cus_id'];
	$qty = $_POST['qty'];

	$product_details = $conn->query("SELECT prod_price FROM tbl_product WHERE prod_id='$product_id'");
	$product_price = $product_details->fetch_assoc();

	$price = $product_price['prod_price'] * $qty;

	if ($conn->query("INSERT INTO tbl_cart VALUES('', '$cus_id', '$product_id', $qty, $price)")) {
		echo true;
	} else {
		echo false;
	}
}
