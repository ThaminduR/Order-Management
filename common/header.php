<?php
include("common/sessionhandler.php");
require('lib/carthandle.php')
?>
<!DOCTYPE html>
<html>

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Stylish | World Desired Men's Store</title>

	<link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<link rel="stylesheet" type="text/css" href="resources/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="resources/sweetalert/sweetalert2.css">

	<script type="text/javascript" src="resources/jquery/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="resources/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="resources/sweetalert/sweetalert2.all.js"></script>

	<div class="header container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<img src="resources/image/logo.png" width="200px" height="200px">
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-12">
						<div class="top-menu">
							<input type="text" id="searchbox" placeholder="search here">
							<button type="button" id="searchbtn"><i class="fa fa-search" aria-hidden="true"></i></button>
							<a href="myaccount.php">
								<?php
								if (isset($_SESSION['cus_info'])) {
									echo "Hi, " . $_SESSION['cus_info']['cus_fname'];
								} else {
									echo "My Account";
								}

								?>
							</a>
							<a href="wishlist.php">Wish List</a>

							<a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
							<span class="badge badge-danger" id="cart-badge"><?php if (isset($cus_info)) {
																					echo CountCart($cus_info['cus_id']);
																				} ?></span>

							<a href="lib/logout.php">
								<?php
								if (isset($_SESSION['cus_info'])) {
									echo ("Log out");
								}

								?>
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="main-menu">
							<div class="dropdown">
								<a class="dropbtn" href="clothes.php">CLOTHES</a>
								<div class="dropdown-content">
									<a href="clothes.php?type=ts">T-Shirt</a>
									<a href="clothes.php?type=sh">Shirts</a>
									<a href="clothes.php?type=tr">Trousers</a>
								</div>
							</div>

							<div class="dropdown">
								<a class="dropbtn" href="watches.php">WATCHES</a>
								<div class="dropdown-content">
									<a href="watches.php?brand=ti">Titan</a>
									<a href="watches.php?brand=ci">Citizen</a>
									<a href="watches.php?brand=ca">Casio</a>
								</div>
							</div>

							<div class="dropdown">
								<a class="dropbtn" href="sports.php">ACCESSORIES</a>
								<!--  <div class="dropdown-content">
							    <a href="sports.php?type=gt">Gifts and Tech</a>
							    <a href="sports.php?type=th">Ties and Hats</a>
							    <a href="sports.php?type=cw">Cold whether</a>
							  </div> -->
							</div>
							<!-- 	<div class="dropdown">
						  <a class="dropbtn" href="shoese.php">SHOESE</a>
						</div> -->
							<div class="dropdown">
								<a class="dropbtn" href="topseller.php">TOP SELLER</a>
							</div>

							<div class="dropdown">
								<a class="dropbtn" href="bestseller.php">BEST SELLER</a>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


</head>

<body>