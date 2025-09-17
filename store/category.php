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
	<title>RoadReady Parts | Category</title>

	<!--
            CSS
            ============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body id="category">

	<!-- start header area -->
	<?php
		include_once("header.php");
	?>
	<!-- end header area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Category</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h1>Category</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
				</div>
			</div>
		</div>
			<div class="col-xl-12 col-lg-12 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
						<select>
							<option value="1">Default sorting</option>
							<option value="1">Default sorting</option>
							<option value="1">Default sorting</option>
						</select>
					</div>
					<div class="sorting mr-auto">
						<select>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
							<option value="1">Show 12</option>
						</select>
					</div>
					<div class="pagination">
						<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
						<a href="#">6</a>
						<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					
					<div class="row">
						<?php
                            include_once("config.php");
                            $qry = "select * from categories order by id desc";
                            $result=mysqli_query($conn, $qry) or exit("category select fail".mysqli_error($conn));
                            while ($row=mysqli_fetch_array($result)) {
                            ?>
						<!-- single product -->
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<a href="subcategory.php?id=<?php  echo $row['id']; ?>">
									<div class="overlay"></div>
								<img class="img-fluid" src="../images_/categories/<?php echo $row['image']; ?>" width="200px" alt="">
								<div class="product-details">
									<h6><?php  echo $row['catname']; ?></h6>
								</a>
									<div class="">
										<p><?php  echo $row['catdescription']; ?></p>
										
									</div>
									<div class="prd-bottom">
										
										
									</div>
								</div>
								
							</div>
						</div>
							<?php
							}
						?>
					</div>
				</section>
				<!-- End Best Seller -->
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Deals of the Week</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<?php
                    		$productqry = "select * from products order by RAND() LIMIT 9";
                    		$productresult=mysqli_query($conn, $productqry) or exit("product select fail".mysqli_error($conn));
                    		while ($productrow=mysqli_fetch_array($productresult)) {

                    	?>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="../images_/products/<?php echo $productrow['image']; ?>" alt="" width="70px"></a>
								<div class="desc">
									<a href="#" class="title"><?php echo $productrow['productname']; ?></a>
									<div class="price">
										<h6>Rs.<?php echo $productrow['productprice']; ?></h6>
										<h6 class="l-through">Rs.210.00</h6>
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
		</div>
	</section>
	<!-- End related-product Area -->

	<!-- start footer Area -->
	<?php
		include_once("footer.php");
	?>
	<!-- End footer Area -->

	<?php
	include_once("script.php");
	?>
</body>

</html>