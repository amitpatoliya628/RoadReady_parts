<?php

session_start();
if(!isset($_SESSION['web_uname'])){
    $_SESSION["error"] = "You must be logged in to place order.";
    header("location:login.php");
    exit();
}

include("config.php");

// Collect billing & shipping details from checkout form
extract($_POST);

$user_id = $_SESSION['user_id'];
$order_number = strtoupper(uniqid("ORD"));

// Fetch cart items
$qry = "SELECT c.product_id, p.productname, p.productprice 
        FROM cart c 
        JOIN products p ON c.product_id = p.id 
        WHERE c.user_id = '$user_id'";
$result = mysqli_query($conn, $qry);

$subtotal = 0;
$shipping = 50;
while($row = mysqli_fetch_assoc($result)){
    $subtotal += $row['productprice'];
}
$total = $subtotal + $shipping;

// Insert order into `orders`
$insert_order = "INSERT INTO orders 
    (user_id, order_number, first_name, last_name, phone, email, address1, address2, country, state, city, pincode, payment_method, subtotal, shipping, total) 
    VALUES 
    ('$user_id', '$order_number', '$first', '$last', '$number', '$email', '$add1', '$add2', '$country', '$state', '$city', '$pincode', '$payment_method', '$subtotal', '$shipping', '$total')";

if(mysqli_query($conn, $insert_order)){
    $order_id = mysqli_insert_id($conn);

    // Reset pointer
    mysqli_data_seek($result, 0);

    // Insert items into `order_items`
    while($row = mysqli_fetch_assoc($result)){
        $product_id = $row['product_id'];
        $product_name = $row['productname'];
        $price = $row['productprice'];
        $total_price = $price;

        $insert_item = "INSERT INTO order_items 
            (order_id, product_id, product_name, price, total_price) 
            VALUES 
            ('$order_id', '$product_id', '$product_name', '$price', '$total_price')";
        mysqli_query($conn, $insert_item);
    }

    // Clear cart
    mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");

    // Redirect to confirmation page
    header("Location: conformation.php?order_id=".$order_id);
    exit();

} else {
    die("Order saving failed: " . mysqli_error($conn));
}
?>
