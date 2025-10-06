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
    <title>RoadReady Parts | Checkout</title>

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
     
    <?php
        if(isset($_SESSION['web_uname'])){
    ?>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="place_order.php" method="post">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="first" placeholder="First Name *" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="last" placeholder="Last Name *" required>
                            </div>
                            
                            <div class="col-md-6 form-group p_star">
                                <input type="tel" class="form-control" id="number" name="number" placeholder="Phone Number*" maxlength="10" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address *" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="add1" placeholder="Address Line 01 *" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add2" name="add2" placeholder="Address Line 02 *" required>
                            </div>
                            <div class="col-md-3 form-group p_star">
                                <select id="country" name="country" class="form-control" required>
                                    <option value="">Select Country</option>
                                    <?php
                                    include("config.php");
                                    $query = mysqli_query($conn, "SELECT * FROM countries ORDER BY name ASC");
                                    while($row = mysqli_fetch_assoc($query)){
                                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                                
                            <div class="col-md-3 form-group p_star">
                                <select id="state" name="state" class="form-control" required>
                                    <option value="">Select State</option>
                                </select>
                            </div>
                                
                            <div class="col-md-3 form-group p_star">
                                <select id="city" name="city" class="form-control" required>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                                
                            <div class="col-md-3 form-group p_star">
                                <select id="pincode" name="pincode" class="form-control" required>
                                    <option value="">Select Pincode</option>
                                </select>
                            </div>

                    </div>
                    <?php
                        include_once("config.php");
                        $user_id=$_SESSION['user_id'];
                        $qry="select c.id, c.user_id, c.product_id, p.productname, p.productprice, p.image from cart c JOIN products p ON c.product_id = p.id where c.user_id = '$user_id' ORDER BY c.id DESC";
                        $result=mysqli_query($conn,$qry) or exit("cart user fail". mysqli_error($conn));
                        $total=0;
                        $subtotal=0;
                        
                    ?>
                    
                    <div class="col-lg-12">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a>Product <span>Total</span></a></li>
                                <?php
                                if (mysqli_num_rows($result)>0) {
                                    while ($row=mysqli_fetch_array($result)) {
                                        $price=$row['productprice'];
                                        $subtotal+=$price;
                                ?>
                                <li><a><?php echo $row['productname']; ?> <span class="last">RS.<?php echo number_format($row['productprice'],2); ?></span></a></li>

                                <?php
                                    }
                                }else{
                                    echo "<tr><td colspan='4'>your cart is empty</td></tr>";
                                }
                                ?>
                            </ul>
                            <ul class="list list_2">
                                <li><a>Subtotal <span>Rs.<?php echo number_format($subtotal,2); ?></span></a></li>
                                <li><a>Shipping <span>Flat rate: RS.50.00</span></a></li>
                                <li><a>Total <span>Rs.<?php echo number_format($total=$subtotal+50,2); ?></span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="payment_method" value="Google Pay" required>
                                    <label for="f-option5">Google Pay</label>
                                    <div class="check"></div>
                                </div>
                                <p>Pay Through Your Google Pay Account</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="payment_method" value="UPI id">
                                    <label for="f-option6">Cash On Delivery</label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Pay When Your Product Reach You By Cash or Online Payment.</p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector" required>
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <input type="hidden" name="total" value="<?php echo $total; ?>">
                            <button type="submit" class="primary-btn text-center">Proceed to Payment</button>
                            <!-- <a class="primary-btn" href="order.php">Proceed to Payment</a> -->
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <?php
		include_once("footer.php");
	?>

    <?php
	include_once("script.php");
	?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        
        // Load States when Country changes
        $("#country").change(function(){
            var country_id = $(this).val();
            $.ajax({
                url: "get_states.php",
                type: "POST",
                data: {country_id: country_id},
                success: function(data){
                    $("#state").html(data);
                    $("#city").html('<option value="">Select City</option>');
                    $("#pincode").html('<option value="">Select Pincode</option>');
                }
            });
        });
    
        // Load Cities when State changes
        $("#state").change(function(){
            var state_id = $(this).val();
            $.ajax({
                url: "get_cities.php",
                type: "POST",
                data: {state_id: state_id},
                success: function(data){
                    $("#city").html(data);
                    $("#pincode").html('<option value="">Select Pincode</option>');
                }
            });
        });
    
        // Load Pincode when City changes
        $("#city").change(function(){
            var city_id = $(this).val();
            $.ajax({
                url: "get_pincodes.php",
                type: "POST",
                data: {city_id: city_id},
                success: function(data){
                    $("#pincode").html(data);
                }
            });
        });
    
    });
    </script>
    <script>
        document.getElementById("number").addEventListener("input", function () {
            // remove everything that is not a digit
            this.value = this.value.replace(/\D/g, '');
        
            // enforce max 10 digits
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }
        });
    </script>

</body>
</html>

<?php
}else{
  $_SESSION["error"] = "you are not authorize to access this page without login";
  header("location:login.php");
}
?>
