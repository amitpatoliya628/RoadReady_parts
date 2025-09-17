<?php
session_start();
if(isset($_SESSION['uname'])){
    include_once('includes/config.php');
    extract($_POST);
    $filename = time()."_".$_FILES['image']['name'];
    $path="../images_/subcategories/".$filename;
    $subcatdescription=mysqli_real_escape_string($conn,$subcatdescription);

    if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
        $qry = "insert into subcategories (catid,subcatname,subcatdescription,image) values('".$catid."','".$subcatname."','".$subcatdescription."','".$filename."')";
        mysqli_query($conn, $qry) or exit("subcategory insert fail".mysqli_error($conn));
        $_SESSION['error']="subcategory added successfully";
        header("location:subcategory_add.php");
    }
    else{
        $_SESSION["error"] = "file upoad fail";
        header("location:subcategory_add.php");
    }


}else{
  $_SESSION["error"] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>