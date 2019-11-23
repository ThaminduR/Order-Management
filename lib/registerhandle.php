<?php
 	include("dbconnection.php");

 	$conn=DBConnection::connectDB();

session_start();


   if(!isset($_POST['submitbutton'])){
   	    header("Location:../myaccount.php");
   }

   $sql = "SELECT cus_id FROM tbl_customer ORDER BY cus_id DESC LIMIT 1;";
   $resultid = mysqli_query($conn, $sql);

   $nor = $resultid->num_rows;

   if($nor == 0){
      $newid = "CUS00001";
   }
   else{
      $rec = $resultid->fetch_assoc();
      $lastid = $rec["cus_id"];
      $num = substr($lastid, 3);
      $num++;
      $newid = "CUS".str_pad($num,5,"0",STR_PAD_LEFT);
   }

   

   $fname= $_POST['firstname'];
   $lname= $_POST['lastname'];
   $mobile= $_POST['mobile'];
   $address= $_POST['address'];
   $email= $_POST['email'];
   $uname = $_POST['username'];
   $pass= $_POST['pass'];
   $repass= $_POST['repass'];

	 $result = mysqli_query($conn,"INSERT INTO tbl_customer(cus_id, cus_fname,cus_lname,cus_mobile,cus_address,cus_email,cus_uname,	password)VALUES ('$newid','$fname','$lname','$mobile','$address','$email','$uname','$pass')");

	  // if(!$result->num_rows){
   // 	$_SESSION['err'] = true;
   // 	header("Location:../myaccount.php");
   // }else{
   // 	$_SESSION['cus_info'] =$result->fetch_assoc();
   // 	header("Location:../index.php");
   // }
    if($result){
      $cus_info=true;
   }
 $result;

 header("Location../myaccount.php");
?>