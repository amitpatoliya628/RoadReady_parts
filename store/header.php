    <!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/Road logo.png" alt="" width="150px"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>			
							<li class="nav-item"><a href="category.php" class="nav-link">Category</a></li>
							<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
							<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="cart.php" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item"><a href="wishlist.php" class=""><span class="ti-heart"></span></a></li>
							<li class="nav-item">
							  <a href="#" class="" data-toggle="modal" data-target="#userProfileModal">
							    <span class="ti-user"></span>
							  </a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->

	<?php
		session_start();
		if(isset($_SESSION['web_uname'])){
		$usernm=$_SESSION['web_uname'];
		include_once("config.php");
		$qry = "select * from web_users where username='$usernm'";
        $result=mysqli_query($conn, $qry) or exit("category select fail".mysqli_error($conn));
		$row=mysqli_fetch_array($result);
	?>

	<!-- User Profile Modal -->
	<div class="modal fade" id="userProfileModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	    <div class="modal-content p-4" style="border-radius: 15px; min-height: 200px;">
	      <div class="d-flex align-items-center">
	
	        <!-- Profile Avatar -->
	        <div class="mr-4">
	          	<div style="width:120px; height:120px; border-radius:15px; background:#e9f0fb; display:flex; 
					align-items:center; justify-content:center; font-size:40px; font-weight:bold; color:#3a4a63;">
	            AR
	          	</div>
	        </div>

	        <!-- User Info -->
	        <div>
	          <h3 class="mb-2"><?php echo $row['username']; ?></h3>
	          <p class="text-muted mb-3">Student of BCA</p>
	          <div class="mb-2">
	            <span class="badge badge-light p-2">
	              <i class="ti-email mr-1"></i> <?php echo $row['email_']; ?>
	            </span>
	            <span class="badge badge-light p-2">
	              <i class="ti-mobile mr-1"></i> +91 <?php echo $row['mobile_no']; ?>
	            </span>
	            <!-- <span class="badge badge-light p-2">
	              <i class="ti-mobile mr-1"></i> 
	            </span> -->
				<?php  $row['bdate']; ?>
				<span class="badge badge-light p-2">
	              <a href="logout.php"><i class="ti-mobile mr-1"></i>Logout</a>
	            </span>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	<?php
		}else{
			
		}
	?>

