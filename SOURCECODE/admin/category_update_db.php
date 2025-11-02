<?php
session_start();
if(isset($_SESSION['uname'])){
    include_once('includes/config.php');
    extract($_POST);
    $catdescription=mysqli_real_escape_string($conn,$catdescription);


    if ($_FILES['image']['error']==0) {
        $filename = time()."_".$_FILES['image']['name'];
        $path="../images_/categories/".$filename;

        if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
            $qry = "update categories set catname='".$catname."',catdescription='".$catdescription."',image='".$filename."'where id=$id";
            mysqli_query($conn, $qry) or exit("category update fail".mysqli_error($conn));
            $_SESSION['error']="category update successfully";
            header("location:category.php");
        }else{
            $_SESSION["error"] = "file upoad fail";
            header("location:category_add.php");
        }
    }else {
        $qry = "update categories set catname='".$catname."',catdescription='".$catdescription."'where id=$id";
        mysqli_query($conn, $qry) or exit("category insert fail".mysqli_error($conn));
        $_SESSION['error']="category update successfully";
        header("location:category.php");
    }


}else{
  $_SESSION["error"] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>