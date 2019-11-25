<?php
include("common/header.php");
require('lib/carthandle.php');

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


<?php
if (!(isset($cus_info))) {
	?>

	<script type="text/javascript">
		//if not logged in fire sweet alert
		Swal.fire({
			position: 'top-end',
			icon: 'error',
			title: 'Oops...',
			text: 'You are not logged in!',
		})
	</script>


	<?php
		// include("lib/registerhandle.php");
		if (isset($_SESSION['err'])) {  //loggin error corrected
			?>
		<script type="text/javascript">
			Swal.fire({
				type: 'error',
				title: 'Oops...',
				text: 'Invalid Username or Password! or Please Register. ',


			})
		</script>


	<?php
			unset($_SESSION['err']);
		}
		?>


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
}
?>

<?php
if (isset($cus_info)) {
	?>

	<div class="container-fluid main">
		<div class="card profile">
			<div class="card-header profileName">
				<?php
					echo $_SESSION['cus_info']['cus_fname'] . " ";
					echo $_SESSION['cus_info']['cus_lname'];
					?>
				<!-- <span class="isVerified">
					<svg width="24" height="24" viewBox="0 0 24 24">
						<path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"></path>
					</svg>
				</span> -->
				<div class="isOnline">
					<small><?php echo $_SESSION['cus_info']['cus_email']; ?></small>
				</div>
			</div>
			<div class="card-body profileBody">
				<div class="profilePic">
					<img class="avatar" src="resources\image\pp.jpg.png" alt="Username">
				</div>
				<div class="profileInfo">
					<p>Role: Fullstack Developer</p>
				</div>
			</div>
			<div class="card-footer actions">
				<div class="actionFirst">
					<svg width="24" height="24" viewBox="0 0 24 24">
						<path d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z"></path>
					</svg> Chat
				</div>
				<div class="actionSecond">
					<svg width="24" height="24" viewBox="0 0 24 24">
						<path d="M11.83,1.73C8.43,1.79 6.23,3.32 6.23,3.32C5.95,3.5 5.88,3.91 6.07,4.19C6.27,4.5 6.66,4.55 6.96,4.34C6.96,4.34 11.27,1.15 17.46,4.38C17.75,4.55 18.14,4.45 18.31,4.15C18.5,3.85 18.37,3.47 18.03,3.28C16.36,2.4 14.78,1.96 13.36,1.8C12.83,1.74 12.32,1.72 11.83,1.73M12.22,4.34C6.26,4.26 3.41,9.05 3.41,9.05C3.22,9.34 3.3,9.72 3.58,9.91C3.87,10.1 4.26,10 4.5,9.68C4.5,9.68 6.92,5.5 12.2,5.59C17.5,5.66 19.82,9.65 19.82,9.65C20,9.94 20.38,10.04 20.68,9.87C21,9.69 21.07,9.31 20.9,9C20.9,9 18.15,4.42 12.22,4.34M11.5,6.82C9.82,6.94 8.21,7.55 7,8.56C4.62,10.53 3.1,14.14 4.77,19C4.88,19.33 5.24,19.5 5.57,19.39C5.89,19.28 6.07,18.92 5.95,18.6V18.6C4.41,14.13 5.78,11.2 7.8,9.5C9.77,7.89 13.25,7.5 15.84,9.1C17.11,9.9 18.1,11.28 18.6,12.64C19.11,14 19.08,15.32 18.67,15.94C18.25,16.59 17.4,16.83 16.65,16.64C15.9,16.45 15.29,15.91 15.26,14.77C15.23,13.06 13.89,12 12.5,11.84C11.16,11.68 9.61,12.4 9.21,14C8.45,16.92 10.36,21.07 14.78,22.45C15.11,22.55 15.46,22.37 15.57,22.04C15.67,21.71 15.5,21.35 15.15,21.25C11.32,20.06 9.87,16.43 10.42,14.29C10.66,13.33 11.5,13 12.38,13.08C13.25,13.18 14,13.7 14,14.79C14.05,16.43 15.12,17.54 16.34,17.85C17.56,18.16 18.97,17.77 19.72,16.62C20.5,15.45 20.37,13.8 19.78,12.21C19.18,10.61 18.07,9.03 16.5,8.04C14.96,7.08 13.19,6.7 11.5,6.82M11.86,9.25V9.26C10.08,9.32 8.3,10.24 7.28,12.18C5.96,14.67 6.56,17.21 7.44,19.04C8.33,20.88 9.54,22.1 9.54,22.1C9.78,22.35 10.17,22.35 10.42,22.11C10.67,21.87 10.67,21.5 10.43,21.23C10.43,21.23 9.36,20.13 8.57,18.5C7.78,16.87 7.3,14.81 8.38,12.77C9.5,10.67 11.5,10.16 13.26,10.67C15.04,11.19 16.53,12.74 16.5,15.03C16.46,15.38 16.71,15.68 17.06,15.7C17.4,15.73 17.7,15.47 17.73,15.06C17.79,12.2 15.87,10.13 13.61,9.47C13.04,9.31 12.45,9.23 11.86,9.25M12.08,14.25C11.73,14.26 11.46,14.55 11.47,14.89C11.47,14.89 11.5,16.37 12.31,17.8C13.15,19.23 14.93,20.59 18.03,20.3C18.37,20.28 18.64,20 18.62,19.64C18.6,19.29 18.3,19.03 17.91,19.06C15.19,19.31 14.04,18.28 13.39,17.17C12.74,16.07 12.72,14.88 12.72,14.88C12.72,14.53 12.44,14.25 12.08,14.25Z"></path>
					</svg> Profile
				</div>
			</div>
		</div>
	</div>

<?php
}
?>


<?php
include("common/footer.php");
?>