
<?php
if(isset($_GET["type"])){
	$subcat=$_GET["type"];
echo $subcat;
}
// var_dump($_POST);
require_once("common/header.php");
require_once("lib/clothehandle.php");
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
						  <a class="dropbtn" href="clothes.php" class="active link">CLOTHES</a>
							  <div class="dropdown-content">
							    <a href="clothes.php?type=SUB00001">T-Shirt</a>
							    <a href="clothes.php?type=SUB00002">Shirts</a>
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
							  <!-- <div class="dropdown-content">
							    <a href="sports.php?type=gt">Gifts and Tech</a>
							    <a href="sports.php?type=th">Ties and Hats</a>
							    <a href="sports.php?type=cw">Cold whether</a>
							  </div> -->
						</div>

						<div class="dropdown">
						  <a class="dropbtn" href="shoese.php">SHOES</a>
						</div>

						<!-- <div class="dropdown">
						  <a class="dropbtn" href="topseller.php">CAPS</a>
						</div> -->

						<div class="dropdown">
						  <a class="dropbtn" href="bestseller.php">TOP SELLER</a>
						</div>
						
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product box Start -->
			<div class="container" style="padding-top: 200px;">
				<div class="row" >
					<div class="col-lg-4 col-md-3 col-sm-2">
						<div class="left-content">
							<h3>Categories</h3>
								<div class="left-content-sub">
									<div class="ecommerce_dres-type">
										<ul>
											<li><a href="clothes.php?type=ts">T-shirts</a></li>
											<li><a href="clothes.php?type=sh">Shirts</a></li>
											<li><a href="clothes.php?type=tr">Trousers</a></li>
										</ul>
									</div>
								</div>
						</div>
						<div class="left-content">
							<h3>Colors</h3>
								<div class="left-content-sub">
									<div class="ecommerce_color">
										<ul>
											<li><a href="#"><i></i> Red</a></li>
											<li><a href="#"><i></i> Brown</a></li>
											<li><a href="#"><i></i> Yellow</a></li>
											<li><a href="#"><i></i> Violet</a></li>
											<li><a href="#"><i></i> Orange</a></li>
											<li><a href="#"><i></i> Blue</a></li>
										</ul>
									</div>
								</div>
						</div>
						<div class="left-content">
							<h3>Colors</h3>
							<div class="left-content-sub">
									<div class="ecommerce_color ecommerce_size">
										<ul>
											<li><a href="#">Medium</a></li>
											<li><a href="#">Large</a></li>
											<li><a href="#">Extra Large</a></li>
											<li><a href="#">Small</a></li>
										</ul>
									</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-3 col-sm-2">
						<div class="right-content-sub " data-wow-delay=".5s">
							<img src="../Stylish/image/CAT00001/PRO00001/CAT00001_PRO00001_1570727079.jpg" class="w-100" />
							<!-- x -->
						</div>

						<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" /> 
								<input type="hidden" name="w3ls1_item" value="Pencil dress" /> 
								<input type="hidden" name="amount" value="50.00" /> 
								<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
						</form>
					</div>
					<div class="col-lg-4 col-md-3 col-sm-2">
					</div>
					
				<div class="row">
				</div>
				</div>
			</div>

	<!-- Product box End-->






<!-- Footer Start -->
<?php
	include("common/footer.php");
?>
<!-- Footer End -->
<script type="text/javascript">
	// $(document).ready(function(){
	// 	var subcatid='<?php ($cat)?>';
	// alert(subcatid);
	//url=handle address
	// $.ajax{
	// 	//load tbl_product_image data(image name)
	// }

	//sql query handle
	//select * from tbl_product_img where subcat='$subcatid';

	//bind src attribute with json result;
	// // <img src=../images/path
	// });
	
	
</script>