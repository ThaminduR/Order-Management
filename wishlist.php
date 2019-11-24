<?php
include("common/header.php");

?>

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