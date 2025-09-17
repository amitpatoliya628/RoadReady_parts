<?php
session_start();
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

	<!--
		CSS
		============================================= -->
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
					<h1>Register to Our Website</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<p>Registration Page</p>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<!-- <div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="registration.php">Create an Account</a>
						</div>
					</div>
				</div> -->
				<div class="col-lg-12 ">
					<div class="login_form_inner">
						<h2>Register in to enter</h2>
						<?php
         					if(isset($_SESSION["error"])){
          				?>
          				<p class="login-box-msg text-danger"><?php echo $_SESSION["error"] ?></p>
          				<?php
          					unset($_SESSION["error"]);
         					}
      					?>
						<form class="row login_form" action="registration_check.php" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<div class="creat_account">
									
									
								</div>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="fullname" name="username" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="fullname" name="email_" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
    							<input type="tel" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile No" pattern="[0-9]{10}" maxlength="10" oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);" onfocus="this.placeholder=''" onblur="this.placeholder='Mobile No'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
        						<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
    						</div>
							
							<div class="col-md-12 form-group">
								<div class="creat_account">
									
									
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Register</button>
								<a href="#">Home Page</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!-- start footer Area -->
	<?php
		include_once("footer.php");
	?>
	<!-- End footer Area -->

	
	<?php
	include_once("script.php");
	?>
	<script>
		document.getElementById("contactForm").addEventListener("submit", function(e) {
    	let password = document.getElementById("password").value;
    	let confirmPassword = document.getElementById("confirm_password").value;

    	if (password !== confirmPassword) {
        	e.preventDefault(); // stop form submission
        	alert("Password and Conform Password is not matching!");
    	}
		});
	</script>
</body>

</html>