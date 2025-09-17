<?php
session_start();
include_once("config.php");

extract($_POST);


// ✅ Check if username or email already exists
$qry = "SELECT * FROM web_users WHERE username='$username' OR email_='$email_' OR mobile_no='$mobile_no'";
$result = mysqli_query($conn, $qry) or exit("check user fail " . mysqli_error($conn));
$count = mysqli_num_rows($result);

if ($count > 0) {
    $_SESSION["error"] = "User already registered with this username/email/mobile!";
    header("location:registration.php");
    exit();
}

// ✅ Insert new user
$qry = "INSERT INTO web_users(username, email_, mobile_no, password, address) 
        VALUES('$username', '$email_', '$mobile_no', '".md5($password)."', '$address')";
$result = mysqli_query($conn, $qry) or exit("insert user fail " . mysqli_error($conn));

if ($result) {
    $_SESSION["success"] = "Registration successful! Please login.";
    header("location:login.php");
    exit();
} else {
    $_SESSION["error"] = "Registration failed! Try again.";
    header("location:registration.php");
    exit();
}
?>
