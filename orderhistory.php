<?php
include('common/header.php');
require('lib/carthandle.php');
?>

<head>
    <!-- <title>Stylish</title>
	<link rel="stylesheet" type="text/css" href="resources/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	 <link rel="stylesheet" type="text/css" href="resources/jquery/jquery-3.4.1.js">
	<link rel="stylesheet" href="resources/jquery/jquery-ui.css"> -->

    <link rel="stylesheet" href="../dataTables/datatables.min.css">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
    <!-- // Include FusionCharts core file -->
    <!-- <script type="text/javascript" src="path/to/local/fusioncharts.js"></script>
 -->
    <!-- // Include FusionCharts Theme file -->
    <!-- <script type="text/javascript" src="path/to/local/themes/fusioncharts.theme.fusion.js"></script>
 -->

    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="resources/sweetalert/sweetalert.min.js"></script> -->
    <script src="../dataTables/datatables.min.js"></script>
    <script src="resources/jquery/jquery-ui.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="resources/sweetalert/sweetalert2.css">  -->


</head>



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


<script>
 
    $('#tblvieword').on('click', 'button', function() {
      var data = dataTable.row($(this).parents('tr')).data();
      var order = data[0];
      $.ajax({
        method: "POST",
        url: "lib/carthandle.php?type=updateFeedback",
        data: {
          order: order,
          feedback:
        },
        dataType: "text",
        success: function(result) {
          
          setTimeout(location.reload(), 1000);
        },
        error: function(eobj, etxt, err) {
          console.log(etxt);
        }
      });
    });

    $('#sidebarCollapse').on('click', function() {
      $('#sidebar').toggleClass('active');
    });


  });
</script> -->


<!-- User Table Start-->
<div class="content">

    <div class="shopping-cart container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <?php if (!isset($cus_info)) {
                    echo ("Please Login to check Order History !");
                } ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">
                                <h4>Order History <h4>
                            </th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="orderhistory">
                        <tr>

                            <td>ORDER ID</td>
                            <td>DoT</td>
                            <td>Track Status</td>
                            <td>Estimated Delivery</td>
                            <td>Feedback</td>



                        </tr>


                        <?php
                        if (isset($cus_info)) {
                            $cus_id = $cus_info['cus_id'];
                            getOrder($cus_id);
                        }
                        ?>
                        <input type="hidden" name="cus_id" id="cus_id" value="<?php echo ($cus_id) ?>">


                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<?php
include("common/footer.php");
?>