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
						  <a class="dropbtn" href="sports.php">ACCESSORIES</a>
							<!--   <div class="dropdown-content">
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
<!-- About Us Start -->

<div class="content">
	<div class="cantactus container-fluid">
		<div class="row">
			<div class="col-md-6 col-xs-12">
			<div class="log-reg-forms">
				<h3>CONTACT US</h3>
				<form id="contact" method="post" action="">
						<div class="inputbox">
							<label>Your Name</label>
							<input type="text" name="yourname" id="name" placeholder="enter your  name" />
							<span id="errusername" name="errusername" style="color: red"></span>
						</div>
						<div class="inputbox">
							<label>Your Email</label>
							<input type="email" name="email" id="email" placeholder="enter your Email" />
							<span id="errpass" name="errpass" style="color: red"></span>
						</div>
						<div class="inputbox">
							<label>Your Phone Number</label>
							<span style="display: inline; width: 5%">+94</span><input type="text" name="mobile" id="mobile" placeholder="enter your mobile number" style="display: inline; width: 90%;" />
						</div>
						<div class="inputbox">
							<label>Your Messege</label>
							<input type="text" name="messge" id="messge"  placeholder="enter your Messege" />
							<span id="errpass" name="errpass" style="color: red"></span>
						</div>
						<div class="clearfix">&nbsp;</div>
						<div align="right">
							<button type="submit" id="loginbutton" name="loginbutton" >Submit</button>
						</div>
					</form>
			</div>	
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="contact-form">
					<h3>STYLISH ONLINE</h3>
					<p>For any problems,please send us a messege via email and we will replyto you as soon as possible.you can send any feedback through this contact us form</p>
					<div>
					<i class="fa fa-clock-o" aria-hidden="true"> &nbsp; Monday-Sunday &nbsp;  &nbsp; &nbsp; 9.00-18.00</i>
					</div>
					<div>
					<i class="fa fa-phone" aria-hidden="true"> &nbsp; Phone &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;011-1234567</i>
					</div>
					<div>
					<i class="fa fa-home" aria-hidden="true"> &nbsp; Address &nbsp;  &nbsp; &nbsp; NO.07,High Level Road,Meepe Junction,Meepe</i>
					</div>
					<div>
					<i class="fa fa-envelope-o" aria-hidden="true">&nbsp; Email &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;Mohomadsalman@gmail.com</i>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="map-content">
		<div class="row">
			<div  class="col-md-10 col-xs-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.915220851927!2d80.08762043949639!3d6.861171757221476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae252d6e0717b59%3A0xa58c3148da2fc862!2sStylish!5e0!3m2!1sen!2slk!4v1574145266949!5m2!1sen!2slk" width="120%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
		</div>
		</div>
	<!-- </div> -->
</div>
	
		




<!-- About Us End -->



<div class="footer container-fluid">
	<div class="row">
		<div class="col-sm-6">
			<div class="footer-menu">
				<a href="delivery info.php">Delivery Information</a>
				<a href="contactus.php">Order History</a>
				<a href="aboutus.php" >About Us</a>
				<a href="contactus.php" class="active-link">Contact Us</a>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="followers">
				<h4>Follow Us On</h4>
				<div>
					<a href=""><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
				</div>
			</div>
	
		</div>
	</div>
	
</div>



















