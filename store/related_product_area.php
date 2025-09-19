<!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Deals of the Week</h1>
						<p>This week Discount is on started go and take amazing discount.</p>
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
								<a href="single-product.php?id=<?php  echo $productrow['id']; ?>"><img src="../images_/products/<?php echo $productrow['image']; ?>" alt="" width="70px"></a>
								<div class="desc">
									<a href="single-product.php?id=<?php  echo $productrow['id']; ?>" class="title"><?php echo $productrow['productname']; ?></a>
									<div class="price">
										<h6>Rs.<?php echo $productrow['productprice']; ?></h6>
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