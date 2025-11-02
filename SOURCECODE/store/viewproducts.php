<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>RoadReady Parts | Products</title>
	<!--  CSS  ============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<?php
	$catid=$_REQUEST['catid'];
	$subcatid=$_REQUEST['subcatid'];

	include_once("config.php");
	$subcatqry = "select * from subcategories where id='".$subcatid."'";
	$subcatresult=mysqli_query($conn, $subcatqry) or exit("category select fail".mysqli_error($conn));
    $subcatrow=mysqli_fetch_array($subcatresult);
	?>
	
	<!-- start header area -->
	<?php
		include_once("header.php");
	?>
	<!-- end header area -->

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Like New <br>Collection!</h1>
									<p>Protect your investment and enhance your car's functionality with a wide selection of practical and durable accessories. 
										The website offers essential items for safety, organization, and everyday convenience, ensuring your vehicle is always prepared for the road ahead.</p>
									
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/banner-img.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

    <!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Free Delivery</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Return Policy</h6>
						<p>7 Days Return Policy</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
						<p>Any Time Customer Support</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Secure Payment</h6>
						<p>High Level Privacy and Security</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

    <!-- start product Area -->
	<section class="owl-carousel section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1><?php echo $subcatrow['subcatname']; ?></h1>
							<p><?php echo $subcatrow['subcatdescription']; ?></p>
						</div>
					</div>
				</div>
				<div class="row">
                    <?php
					
                    $productqry = "select * from products where catid='".$catid."' && subcatid='".$subcatid."' order by id desc";
                    $productresult=mysqli_query($conn, $productqry) or exit("product select fail".mysqli_error($conn));
                    while ($productrow=mysqli_fetch_array($productresult)) {

                    ?>
                    <!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="../images_/products/<?php echo $productrow['image']; ?>" alt="">
							<div class="product-details">
								<h6><?php echo $productrow['productname']; ?></h6>
								<div class="price">
									<h6>Rs.<?php echo $productrow['productprice']; ?></h6>
								</div>
								<div class="prd-bottom">
									
									<a href="" id="AddToCart" data-id="<?php echo $productrow['id']; ?>" class="social-info AddToCart">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" id="Wishlist" data-id="<?php echo $productrow['id']; ?>" class="social-info Wishlist">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="single-product.php?id=<?php echo $productrow['id']; ?>" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
                    <?php
                    }
                    ?>
				</div>
			</div>
		</div>
		
	</section>
	<!-- end product Area -->

	<!-- Start related-product Area -->
		<?php include_once("related_product_area.php"); ?>
	<!-- End related-product Area -->

	<!-- start footer Area -->
	<?php
		include_once("footer.php");
	?>
	<!-- end footer area -->

	<?php
	include_once("script.php");
	?>

	<script>
		$(document).ready(function(){
			$(".AddToCart").click(function(e){
				e.preventDefault();
				var product_id=$(this).data('id');
				$.ajax({
                    url:"addtocart.php",
                    type:"GET",
					cache:false,
                    data:{
                        "product_id":product_id
                    },
                    success:function(result){
						if(result==0){
							window.location.href="login.php";
						}else{
							alert("Added to Cart");
						}
                    }
                });
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$(".Wishlist").click(function(e){
				e.preventDefault();
				var product_id=$(this).data('id');
				$.ajax({
                    url:"addtowishlist.php",
                    type:"GET",
					cache:false,
                    data:{
                        "product_id":product_id
                    },
                    success:function(result){
						if(result==0){
							window.location.href="login.php";
						}else{
							alert("Added to Wishlist");
						}
                    }
                });
			});
		});
	</script>

</body>

</html>