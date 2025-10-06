<?php
session_start();
if(isset($_SESSION['uname'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>

  <!-- add your style here -->
   <?php
      include_once("includes/style.php");
   ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php
    include_once("includes/header.php");
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php 
    include_once("includes/sidebar.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
      include_once("includes/config.php");
      $ordqry = "select COUNT(*) AS ordtotal FROM orders";
      $ordresult=mysqli_query($conn, $ordqry) or exit("category select fail".mysqli_error($conn));
      $ordrow=mysqli_fetch_array($ordresult);

      $catqry = "select COUNT(*) AS cattotal FROM categories";
      $catresult=mysqli_query($conn, $catqry) or exit("category select fail".mysqli_error($conn));
      $catrow=mysqli_fetch_array($catresult);

      $subcatqry = "select COUNT(*) AS subcattotal FROM subcategories";
      $subcatresult=mysqli_query($conn, $subcatqry) or exit("category select fail".mysqli_error($conn));
      $subcatrow=mysqli_fetch_array($subcatresult);

      $proqry = "select COUNT(*) AS prototal FROM products";
      $proresult=mysqli_query($conn, $proqry) or exit("category select fail".mysqli_error($conn));
      $prorow=mysqli_fetch_array($proresult);
    ?>
    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
    <!-- add footer here -->
     <?php
      include_once("includes/footer.php");
    ?>
  
  <!-- add script here -->
    <?php
      include_once("includes/script.php");
    ?>

</body>
</html>

<?php
}else{
  $_SESSION["error"] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>