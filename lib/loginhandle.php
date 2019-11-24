<?php
	include("dbconnection.php");
   
	$conn=DBConnection::connectDB();

session_start();

// Login Validation Start

   if(!isset($POST['loginbutton'])){
   		header("Location:../myaccount.php");
   }

   $usrname= $_POST['username'];
   $pwd=$_POST['pass'];

   $result = $conn->query("SELECT * FROM tbl_customer WHERE cus_uname='$usrname' AND password='$pwd'");

   if(!$result->num_rows){
   	$_SESSION['err'] = true;
   	header("Location:../myaccount.php");
   }else{
      $_SESSION["cus_info"] =$result->fetch_assoc();
   	header("Location:../index.php");

     } 
   
// Login Validaion End

     
   function getEmployeeCount(){
   $conn = DBConnection::connectDB();
   $table = "tbl_employee";

   $sql = "SELECT count(*) FROM $table WHERE emp_status=1;";

   $result = $conn->query($sql);

   if($conn->errno){
      echo("SQL Error : " .$conn->error);
      exit;
   }
   $rec = $result->fetch_array();
   echo($rec[0]);
   $conn->close();
}

// SELECT COUNT(*) FROM `tbl_cart` WHERE cus_id=
