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
    <title>RoadReady Parts | Cart</title>

    <!--    CSS     -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css?">
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
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.php">Cart</a>
                    </nav>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <?php
        include_once("config.php");
        $user_id=$_SESSION['user_id'];
        $qry="select c.id, c.user_id, c.product_id, p.productname, p.productprice, p.image from cart c JOIN products p ON c.product_id = p.id where c.user_id = '$user_id' ORDER BY c.id DESC";
        $result=mysqli_query($conn,$qry) or exit("cart user fail". mysqli_error($conn));
        $total=0;
        
    ?>

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <!-- <th scope="col">Total</th>   Discount Price -->
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (mysqli_num_rows($result)>0) {
                                    while ($row=mysqli_fetch_array($result)) {
                                        $subtotal=$row['productprice'];
                                        $total+=$subtotal;
                            ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="../images_/products/<?php echo $row['image']; ?>" alt="" width="152px">
                                        </div>
                                        <div class="media-body">
                                            <p><h4><?php echo $row['productname']; ?></h4></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>Rs.<?php echo number_format($row['productprice'],2); ?></h5>
                                </td>
                                <!-- <td>
                                    <h5>Rs.<?php echo number_format($subtotal,2); ?></h5>
                                </td> -->
                                <td>
                                    <a href="cart_item_delete.php?id=<?php echo $row['id']; ?>">
                                        <img src="img/rem1.jpg" alt="Remove Item">
                                    </a>
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

                                </td>
                                <td>
                                    <h4>Subtotal</h4>
                                </td>
                                <td>
                                    <h4>Rs.<?php echo number_format($total,2); ?></h4>
                                </td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class="out_button_area">
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="primary-btn" href="category.php">Continue Shopping</a> &nbsp
                                        <a class="primary-btn" href="checkout.php">Proceed to checkout</a>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

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