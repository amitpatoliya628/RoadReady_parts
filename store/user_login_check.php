<?php
session_start();
include_once("config.php");

extract($_POST);
$qry="select * from web_users where username='$username' && password='".md5($password)."'";
$result=mysqli_query($conn,$qry) or exit("select user fail". mysqli_error($conn));
$count=mysqli_num_rows($result);
$userrow=mysqli_fetch_array($result);
$user_id=$userrow['id'];

if($count>0){
    $_SESSION['web_uname']=$username;
    $_SESSION['user_id']=$user_id;
    header("location:index.php");
}else{
    $_SESSION["error"]="username or password is incorrect";
    header("location:index.php");
}

?>