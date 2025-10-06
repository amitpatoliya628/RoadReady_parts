<?php
session_start();
if(isset($_SESSION['uname'])){
    include_once('includes/config.php');
    extract($_POST);
    $filename = time()."_".$_FILES['image']['name'];
    $path="../images_/categories/".$filename;
    $catdescription=mysqli_real_escape_string($conn,$catdescription);

    if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
        $qry = "insert into categories (catname,catdescription,image) values('".$catname."','".$catdescription."','".$filename."')";
        mysqli_query($conn, $qry) or exit("category insert fail".mysqli_error($conn));
        $_SESSION['error']="category added successfully";
        header("location:category.php");
    }
    else{
        $_SESSION["error"] = "file upoad fail";
        header("location:category.php");
    }


}else{
  $_SESSION["error"] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>