<?php
session_start();
if(isset($_SESSION['web_uname'])){

	if(!isset($_GET['order_id'])){
        die("Invalid access. No order ID found.");
    }

    $order_id = intval($_GET['order_id']);

    // Fetch order details
	include_once("config.php");
    $order_qry = "SELECT o.*, 
                         c.name AS country_name, 
                         s.name AS state_name, 
                         ci.name AS city_name, 
                         p.pincode AS pincode_value
                  FROM orders o
                  LEFT JOIN countries c ON o.country = c.id
                  LEFT JOIN states s ON o.state = s.id
                  LEFT JOIN cities ci ON o.city = ci.id
                  LEFT JOIN pincodes p ON o.pincode = p.pincode
                  WHERE o.id='$order_id' 
                  AND o.user_id='{$_SESSION['user_id']}'";
    $order_res = mysqli_query($conn, $order_qry);

    if(mysqli_num_rows($order_res) == 0){
        die("Order not found.");
    }

    $order = mysqli_fetch_assoc($order_res);

    // Fetch order items
    $items_qry = "SELECT * FROM order_items WHERE order_id='$order_id'";
    $result = mysqli_query($conn, $items_qry);
?>

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
	<title>RoadReady Parts</title>

	<!-- CSS ============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

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
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Thank you. Your order has been received. Please take a Screenshot for your Safty.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Billing Details</h4>
						<ul class="list">
							<li><a><span>Name</span> : <?php echo $order['first_name']." ".$order['last_name']; ?></a></li>
							<li><a><span>Mobile No.</span> : <?php echo $order['phone']; ?></a></li>
							<li><a><span>E-Mail Address</span> : <?php echo $order['email']; ?></a></li>
							<li><a><span>Postcode </span> : <?php echo $order['pincode']; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Order Info</h4>
						<ul class="list">
							<li><a><span>Order number</span> : <?php echo $order['order_number']; ?></a></li>
							<li><a><span>Date</span> : <?php echo date("d-m-Y"); ?></a></li>
							<li><a><span>Payment method</span> : <?php echo $order['payment_method']; ?></a></li>
							<li><a><span>Total</span> : Rs.<?php echo $order['total']; ?></a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Shipping Address</h4>
						<ul class="list">
							<li><a><span>Address</span> : <?php echo $order['address1']; ?></a></li>
							<li><a><span>		</span> : <?php echo $order['address2']; ?></a></li>
							<li><a><span>Country, State </span> :  <?php echo $order['country_name'].", ".$order['state_name']; ?></a></li>
							<li><a><span>City, Postcode </span> : <?php echo $order['city_name'].", ".$order['pincode']; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
                                if (mysqli_num_rows($result)>0) {
                                    while ($row=mysqli_fetch_array($result)) {
                                        $price=$row['price'];
                                        
                            ?>
							<tr>
								<td>
									<p><?php echo $row['product_name']; ?></p>
								</td>
								<td>
									<p>Rs.<?php echo $row['price']; ?></p>
								</td>
							</tr>
							<?php
                                    }
                                }else{
                                    echo "<tr><td colspan='4'>your cart is empty</td></tr>";
                                }
                                ?>
							<tr>
								<td>
									<h4>Subtotal</h4>
								</td>
								
								<td>
									<p>Rs.<?php echo $order['subtotal']; ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Shipping</h4>
								</td>
								
								<td>
									<p>Flat rate: Rs.<?php echo $order['shipping']; ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								
								<td>
									<p>Rs.<?php echo $order['total']; ?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->

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

<?php
}else{
  $_SESSION["error"] = "you are not authorize to access this page without login";
  header("location:login.php");
}
?>
