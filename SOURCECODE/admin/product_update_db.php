<?php
session_start();
if(isset($_SESSION['uname'])){
    include_once('includes/config.php');
    extract($_POST);
    $productdescription=mysqli_real_escape_string($conn,$productdescription);


    if ($_FILES['image']['error']==0) {
        $filename = time()."_".$_FILES['image']['name'];
        $path="../images_/products/".$filename;

        if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
            $qry = "UPDATE products set catid='".$catid."',productname='".$productname."',productprice='".$productprice."',productdescription='".$productdescription."',image='".$filename."'where id=$id";
            mysqli_query($conn, $qry) or exit("product update fail".mysqli_error($conn));
            $_SESSION['error']="product update successfully";   
            header("location:products.php");
            
        }else{
            $_SESSION["error"] = "file upoad fail";
            header("location:products_add.php");
        }
    }else {
        $qry = "UPDATE products set catid='" . $catid . "', productname='".$productname."',productprice='".$productprice."', productdescription='".$productdescription."' WHERE id=$id";
        mysqli_query($conn, $qry) or exit("category insert fail".mysqli_error($conn));
        $_SESSION['error']="product update successfully";
        header("location:products.php");
        
    }


}else{
  $_SESSION["error"] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>