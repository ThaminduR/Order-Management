<?php
 include("common/header.php");
?>

<div class="header container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-4 col-sm-3">
			<img src="resources/image/logo.png" width="200px" height="200px">
		</div> 
		 <div class="col-lg-6 col-md-8 col-sm-9"> 
			<div class="row">
				<div class="col-sm-12">
					<div class="top-menu">
						<input type="text" id="searchbox" placeholder="search here">
						<button type="button" id="searchbtn"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="myaccount.php">My Account</a>
						<a href="wishlist.php">Wish List</a>
						<a href="checkout.php">Check Out</a>
						<a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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
						  <a class="dropbtn" href="sports.php">SPORTS</a>
							  <div class="dropdown-content">
							    <a href="sports.php?type=gt">Gifts and Tech</a>
							    <a href="sports.php?type=th">Ties and Hats</a>
							    <a href="sports.php?type=cw">Cold whether</a>
							  </div>
						</div>

						<div class="dropdown">
						  <a class="dropbtn" href="shoese.php">SHOES</a>
						</div>

						<div class="dropdown">
						  <a class="dropbtn" href="topseller.php">CAPS</a>
						</div>

						<div class="dropdown">
						  <a class="dropbtn" href="bestseller.php">TOP SELLER</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="welcome container-fluid">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<img src="resources/image/welcome.png" align="center">
				<h3>WELCOME TO STYLISH</h3>
				<p>Congratulations! Your account has been successfully Created</p>
			</div>
		</div>
	</div>
	
</div>


<?php
include("common/footer.php");

?>