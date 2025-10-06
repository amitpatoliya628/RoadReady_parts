<?php
session_start();
if (isset($_SESSION['web_uname'])) {

    $product_id=$_GET['product_id'];
    $user_id=$_SESSION['user_id'];
    include_once("config.php");
    $qry = "insert into cart(user_id,product_id) values('".$user_id."','".$product_id."')";
    $result=mysqli_query($conn, $qry) or exit("add to cart fail".mysqli_error($conn));
    $output="1";
    
    echo $output;
}else{
    echo "0";
}
?>