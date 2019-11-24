<?php
include("common/header.php");
require('lib/carthandle.php');
// include("lib/registerhandle.php");
if (isset($_SESSION['err'])) {
	?>
	<script type="text/javascript">
		Swal.fire({
			type: 'error',
			title: 'Oops...',
			text: 'Invalid Username or Password!',
		})
	</script>
<?php
	unset($_SESSION['err']);
}
?>

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

<div class="content">
	<div class="myaccount-form container-fluid">
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="log-reg-forms">
					<p>Login Form</p>

					<form id="login" method="post" action="lib/loginhandle.php">
						<div class="inputbox">
							<label>User Name</label>
							<input type="text" name="username" id="name" placeholder="enter your user name" />
							<span id="errusername" name="errusername" style="color: red"></span>
						</div>
						<div class="inputbox">
							<label>Password</label>
							<input type="Password" name="pass" id="pass" placeholder="enter your Password" />
							<span id="errpass" name="errpass" style="color: red"></span>
							<a href="fogotpass.php">Forgot Password</a>
						</div>
						<div class="clearfix">&nbsp;</div>
						<div align="right">
							<button type="submit" id="loginbutton" name="loginbutton">Login</button>
						</div>
					</form>

				</div>
			</div>

			<div class="col-md-6 col-xs-12">
				<div class="log-reg-forms">
					<p>Register Form</p>

					<form id="register" name="register" method="post" action="lib/registerhandle.php">
						<div class="inputbox">
							<label>First Name</label>
							<input type="text" name="firstname" id="fname" placeholder="enter your first name" />
							<span id="errfname" name="errfname" style="color: red"></span>
						</div>
						<div class="inputbox">
							<label>Last Name</label>
							<input type="text" name="lastname" id="lname" placeholder="enter your last name" />
							<span id="errlname" name="errlname" style="color: red"></span>
						</div>
						<div class="inputbox">
							<label>Email Address</label>
							<input type="email" name="email" id="email" placeholder="enter your email address" />
							<span id="erremail" name="erremail" style="color: red"></span>
						</div>
						<div class="inputbox">
							<label>Address</label>
							<input type="address" name="address" id="address" placeholder="enter your address" />
							<span id="erraddress" name="erraddress" style="color: red"></span>
						</div>
						<div class="inputbox">
							<label>Mobile Number</label>
							<span style="display: inline; width: 5%">+94</span><input type="text" name="mobile" id="mobile" placeholder="enter your mobile number" style="display: inline; width: 90%;" />
							<span id="errmobile" name="errmobile" style="color: red"></span>
						</div>
						<div class="inputbox">
							<label>User Name</label>
							<input type="text" name="username" id="uname" placeholder="enter your user name" />
							<span id="erruname" name="erruname" style="color: red"></span>
						</div>
						<div class="inputbox">
							<label>Password</label>
							<input type="password" name="pass" id="regpass" placeholder="enter your Password" />
							<span id="errregpass" name="errregpass" style="color: red"></span>
						</div>
						<div class="inputbox">
							<label>Re Type Password</label>
							<input type="password" name="repass" id="repass" placeholder="retype your password" />
							<span id="errrepass" name="errrepass" style="color: red"></span>
						</div>
						<div class="clearfix">&nbsp;</div>
						<div align="right">
							<button type="submit" id="submitbutton" name="submitbutton">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="resources/jquery/jquery-3.4.1.js"></script>
<script type="text/javascript">
	$("#login").submit(function() {
		var username = $.trim($("#name").val());
		var password = $.trim($("#pass").val());

		if (username == "" && password == "") {
			$("#errusername").text("User name cannot be empty");
			$("#errpass").text("Password cannot be empty");
			return false;
		}
		if (username == "") {
			$("#errusername").text("User name cannot be empty");
			$("#name").focus();
			return false;
		}
		if (password == "") {
			$("#errpass").text("Password cannot be empty");
			$("#pass").focus();
			return false;
		}
	});

	$("#name").keypress(function() {
		$("#errusername").text("");
	});
	$("#pass").keypress(function() {
		$("#errpass").text("");
	});

	$("#register").submit(function() {
		var fname = $.trim($("#fname").val());
		var lname = $.trim($("#lname").val());
		var email = $.trim($("#email").val());
		var address = $.trim($("#address").val());
		var mobile = $.trim($("#mobile").val());
		var uname = $.trim($("#uname").val());
		var regpass = $.trim($("#regpass").val());
		var repass = $.trim($("#repass").val());

		if (fname == "" && lname == "" && email == "" && address == "" && mobile == "" && uname == "" && regpass == "" && repass == "") {
			$("#errfname").text("First name cannot be empty");
			$("#errlname").text("Last name cannot be empty");
			$("#erremail").text("Email cannot be empty");
			$("#erraddress").text("Address cannot be empty");
			$("#errmobile").text("Mobile number cannot be empty");
			$("#erruname").text("User name cannot be empty");
			$("#errregpass").text("Password cannot be empty");
			$("#errrepass").text("Repassword cannot be empty");
			return false;
		}
		if (fname == "") {
			$("#errfname").text("First name cannot be empty");
			$("#fname").focus();
			return false;
		}
		if (lname == "") {
			$("#errlname").text("Last name cannot be empty");
			$("#lname").focus();
			return false;
		}
		if (email == "") {
			$("#erremail").text("Email connot be empty");
			$("#email").focus();
			return false;
		}
		if (address == "") {
			$("#erraddress").text("Address connot be empty");
			$("#email").focus();
			return false;
		}
		if (mobile == "") {
			$("#errmobile").text("Mobile number connot be empty");
			$("#mobile ").focus();
			return false;
		}
		if (uname == "") {
			$("#erruname").text("User name connot be empty");
			$("#uname").focus();
			return false;
		}
		if (regpass == "") {
			$("#errregpass").text("Password connot be empty");
			$("#regpass").focus();
			return false;
		}
		if (repass == "") {
			$("#errrepass").text("Repassword connot be empty");
			$("#repass").focus();
			return false;
		}

		if (regpass !== repass) {
			$("#errrepass").text("Password doesn't match");
			$("#repass").focus();
			return false;
		}

	});
	$("#fname").keypress(function() {
		$("#errfname").text("");
	});
	$("#lname").keypress(function() {
		$("#errlname").text("");
	});
	$("#email").keypress(function() {
		$("#erremail").text("");
	});
	$("#address").keypress(function() {
		$("#erraddress").text("");
	});
	$("#mobile").keypress(function() {
		$("#errmobile").text("");
	});
	$("#uname").keypress(function() {
		$("#erruname").text("");
	});
	$("#regpass").keypress(function() {
		$("#errregpass").text("");
	});
	$("#repass").keypress(function() {
		$("#errrepass").text("");
	});
</script>

<!-- <script type="text/javascript">
 	$(document).ready(function(){
 		$("#submitbutton").click(function(){
 			window.open("welcome.php");
 		})
 	})
 </script>
 -->


<?php
include("common/footer.php");
?>