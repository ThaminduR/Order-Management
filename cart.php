<?php
include("common/header.php");
require('lib/carthandle.php');
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
							<a class="dropbtn" href="clothes.php" class="active link">CLOTHES</a>

						</div>

						<div class="dropdown">
							<a class="dropbtn" href="watches.php">WATCHES</a>

						</div>

						<div class="dropdown">
							<a class="dropbtn" href="sports.php">ACCESSORIES</a>

						</div>

						<div class="dropdown">
							<a class="dropbtn" href="shoes.php">SHOES</a>
						</div>



					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Cart Start -->
<div class="content">
	<div class="toast toastrem" style="position: absolute; top: 0; right: 0;" data-autohide="false">
		<div class="toast-header">
			<svg class="rounded mr-2" width="20" height="20" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
				<rect fill="#007aff" width="100%" height="100%" /></svg>
			<strong class="mr-auto">Stylish</strong>
			<small></small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="toast-body">
			Product Removed from cart !
		</div>
	</div>
	<div class="shopping-cart container-fluid">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<?php if (!isset($cus_info)) {
					echo ("Please login to add to cart !");
				} ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">
								<h4>Shopping cart<h4>
							</th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody id="cartdetails">
						<tr>
							<th scope="row"><a href="clothes.php">
									<span class="fa fa-angle-left"></span>
									continue shopping
								</a></th>

							<td height="75px"></td>
							<td></td>
							<td></td>
						</tr>
						<tr>

							<td>Item</td>
							<td>Qty</td>
							<td>Price</td>
							<td></td>
							<td></td>

						</tr>


						<?php
						if (isset($cus_info)) {
							$cus_id = $cus_info['cus_id'];
							getCart($cus_id);
						}
						?>
						<input type="hidden" name="cus_id" id="cus_id" value="<?php echo ($cus_id) ?>">
						<tr>
							<td id="Subtotal"><b>Sub Total</b>
							<td></td>
							<td>
								<!-- Subtotal is calculated via total function in cart handler -->
								<?php
								if (isset($cus_info)) {
									$cus_id = $cus_info['cus_id'];
									echo (Total($cus_id));
								}
								?>
							</td>
							<td>
								<!-- Button to checkout the cart -->
								<form action='lib/checkout.php' method='GET'>
									<button type='submit' class='btn btn-success'>Check Out</button></form>
								<!-- onclick='document.location.href="lib/checkout.php"' -->

							</td>
							<td></td>
							</td>

						</tr>

					</tbody>
				</table>


			</div>
		</div>
	</div>
</div>
<!-- Cart End -->


<script type="text/javascript">
	$("#cartdetails").on("click", ".remove", function() { // after load page if click remove run function
		// $(this).parents("tr").remove();
		var cus_id = $("#cus_id").val();
		var product = ($(this).parents("tr").find(".product").val());
		var url = "lib/carthandle.php?type=DeleteCartItem";
		$.ajax({
			method: "POST",
			url: url,
			data: {
				product: product,
				cus_id: cus_id
			},
			dataType: "text",
			success: function(result) {
				swal.fire({
					icon: "success",
					text: "Item removed sucsessfully !",
				});
				setTimeout(location.reload(), 1000);

				// alert(result);
				res = result.split(",");
				// if (res[0] == "0") {
				// 	swal("Error", res[1], "error");
				// } else if (res[0] == "1") {
				// 	swal("Success", res[1], "success");
				// 	// window.location = "viewcustomer.php";
				// }

			},
			error: function(eobj, etxt, err) {
				console.log(etxt);
			}

		});

		$(this).parents("tr").remove();

	});
</script>
<!-- Footer Start -->
<?php
include("common/footer.php");
?>
<!-- Footer End -->