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
                        <a href="myaccount.php">My Account</a>
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
                            <div class="dropdown-content">
                                <a href="clothes.php?type=PRO00001">T-Shirt</a>
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

<!-- Cart Start -->
<div class="content">

    <div class="shopping-cart container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <?php if (!isset($cus_info)) {
                    echo ("Please Login to add to wishlist !");
                } ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">
                                <h4>Wishlist <h4>
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
                            getWish($cus_id);
                        }
                        ?>
                        <input type="hidden" name="cus_id" id="cus_id" value="<?php echo ($cus_id) ?>">


                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
<script type="text/javascript">
    $("#cartdetails").on("click", ".remove", function() {
        var cus_id = $("#cus_id").val();
        var product = ($(this).parents("tr").find(".product").val());
        var url = "lib/carthandle.php?type=DeleteWishItem";
        $.ajax({
            method: "POST",
            url: url,
            data: {
                product: product,
                cus_id: cus_id
            },
            dataType: "text",
            success: function(result) {
                res = result.split(",");
                if (res[0] == "0") {
                    swal("Error", res[1], "error");
                } else if (res[0] == "1") {
                    swal("Success", res[1], "success");

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