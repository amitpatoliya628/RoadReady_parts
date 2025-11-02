<?php
session_start();
if(isset($_SESSION['web_uname'])){
    include_once('config.php');
    extract($_POST);
  
    $qry = "insert into contacts (name,email,subject,message) values('".$name."','".$email."','".$subject."','".$message."')";
    mysqli_query($conn, $qry) or exit("Record insert fail".mysqli_error($conn));
    $_SESSION['error']="We Will Send You Mail Soon";
    header("location:contact.php");

}else{
  $_SESSION["error"] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>