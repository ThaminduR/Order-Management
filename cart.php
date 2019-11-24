<?php
include("common/header.php");
require('lib/carthandle.php');
?>



<!-- Cart Start -->
<div class="content">

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
									Total($cus_id);
								}
								?>
							</td>
							<td>
								<!-- Button to checkout the cart -->

								<button type='button' onclick='document.location.href="lib/checkout.php"' class='btn btn-success'>Check Out</button>


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
				// alert(result);
				res = result.split(",");
				if (res[0] == "0") {
					swal("Error", res[1], "error");
				} else if (res[0] == "1") {
					swal("Success", res[1], "success");
					// window.location = "viewcustomer.php";
				}
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