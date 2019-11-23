<?php
include("dbconnection.php");

if(isset($_GET["type"])){ 
	$type = $_GET["type"];
	$type();
	}
// get cart products start
function getCart($cus_id){
	$conn= DBConnection::connectDB();

	$sql = "SELECT tbl_product.prod_id,tbl_product.prod_name, tbl_cart.qty, tbl_cart.price FROM tbl_product INNER JOIN tbl_cart ON tbl_product.prod_id = tbl_cart.prod_id WHERE tbl_cart.cus_id='$cus_id' ;";
	$result = $conn->query($sql);
	$output="<tr value='prod_name'></tr>";
	$rows = $result->num_rows;
	if($rows>0){
		 while($rec = $result->fetch_assoc()){
		 	$output.= "<tr><td>".$rec["prod_name"]."</td><td>".$rec["qty"]."</td><td>".$rec["price"]."</td><td><input type='hidden' class='product' value='".$rec["prod_id"]."'><i class='fa fa-times remove' aria-hidden='true'></i></td></tr>";

		}

	
		echo $output;
		$conn->close();
	}
}



// /////////////////////////////////////////////////////////////////////////////////


// //////////////////////////////////////////////////////////////////////////////////

// get cart products end
// $output ="<td value='[prod_id]'></td>";

	// if($conn->errno){
	// 	echo("SQL Error : ".$conn->error);
	// 	exit;
	// }
	// while($rec = $result->fetch_assoc()){
	// 	$output .="<td value='".$rec["prod_id"]."'>".$rec["price"]."</td>";
	// }
	// echo $output;

// Count all notification Start
function CountCart($cus_id){
	$conn=  DBConnection::connectDB();
	// $cusid=$_POST['cus_id']
	$table ='tbl_cart';
	$sql = "SELECT  count(*) FROM $table WHERE cus_id='$cus_id';";
	$result = $conn->query($sql);

   if($conn->errno){
      echo("SQL Error : " .$conn->error);
      exit;
   }
   $rec = $result->fetch_array();
   echo($rec[0]);
   $conn->close();
}

function DeleteCartItem(){
	$prod_id = $_POST['product'];
	$cus_id = $_POST['cus_id'];

	$conn=  DBConnection::connectDB();
	$sql = "DELETE FROM tbl_cart WHERE prod_id = ? AND cus_id = ? ";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss",$prod_id,$cus_id);

	if(!$stmt->execute()){
		echo("0,SQL Error : ".$stmt->error);
	}
	else{
		
		echo("1,Successfully Removed!");
	}
	$stmt->close();
	$conn->close();
}

// Count all notification End
?>

