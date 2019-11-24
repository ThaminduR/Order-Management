<?php
include("common/header.php");
require_once("lib/carthandle.php");
?>



<div class="content">
	<div style="width: 100%;">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="resources/image/banner1.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="resources/image/banner2.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="resources/image/banner3.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
<!-- Products Start  -->
<div class="banner-bootom-w3-agileits">
	<div class="product container">
		<div class="row">
			<div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
				<a href="clothes.php">
					<div class="bb-left-agileits-w3layouts-inner">
						<h3>SALE</h3>
						<h4>upto<span>75%</span></h4>
					</div>
				</a>
			</div>
			<div class="col-md-4 bb-grids bb-middle-agileits-w3layouts">
				<a href="watches.php">
					<div class="bb-middle-top">
						<h3>SALE</h3>
						<h4>upto<span>55%</span></h4>
					</div>
				</a>
				<a href="Accessories.php">
					<div class="bb-middle-bottom">
						<h3>SALE</h3>
						<h4>upto<span>65%</span></h4>
					</div>
				</a>
			</div>
			<div class="col-md-3 bb-grids bb-right-agileits-w3layouts">
				<a href="shoese.php">
					<div class="bb-right-top">
						<h3>SALE</h3>
						<h4>upto<span>50%</span></h4>
					</div>
				</a>
				<a href="Accessories.php">
					<div class="bb-right-bottom">
						<h3>SALE</h3>
						<h4>upto<span>60%</span></h4>
					</div>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div> <!--  $cus_id = $cus_info['cus_id'] -->
</div>
<!-- $cus_id = $cus_info['cus_id']; CountCart($cus_id);
 -->
<!--  Products End-->
<!-- Our servicess and Google Map start -->
<div class="container-fluid">
	<div class="Ourser container ">
		<div class="row">
			<div class="col-md-6">
				<h3>Our Services</h3>
				<!-- <div class="support"> -->
				<div class="col-md-2 ficon hvr-rectangle-out">
					<i class="fa fa-user " aria-hidden="true"></i>
				</div>
				<div class="col-md-10 ftext">
					<h4>24/7 online free support</h4>
					<p>Praesent rutrum vitae ligula sit amet vehicula. Donec eget libero nec dolor tincidunt vulputate.</p>
				</div>
				<div class="clearfix"></div>
				<!-- </div> -->
			</div>
			<div class="col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.277307598706!2d80.08797971472013!3d6.8573290950444425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae252d6e0717b59%3A0xa58c3148da2fc862!2sStylish!5e0!3m2!1sen!2slk!4v1570959732862!5m2!1sen!2slk" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
		</div>
	</div>
</div>
<!-- Our servicess and Google Map End -->
<?php
include("common/footer.php");
?>