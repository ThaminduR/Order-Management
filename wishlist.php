<?php
include("common/header.php");

?>


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