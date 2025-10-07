<?php
session_start();
if(isset($_SESSION['uname'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User</title>

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
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
              <li class="breadcrumb-item" active>User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
      <section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="card-header">
              <h3 class="card-title"><b>Users list</b></h3>
              <a href="user_add.php"><button class="btn btn-primary float-right">New User</button></a>
          </div>
          <div class="card-header text-muted border-bottom-0">
                  
          </div>
          <div class="row">
            <?php
              include_once("includes/config.php");
              $qry="select * from users";
              $result=mysqli_query($conn,$qry) or exit("users select fail".mysqli_error($conn));
              while ($row=mysqli_fetch_array($result)) {
                
            ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo $row['username']; ?> &nbsp<sup><?php echo $row['role']; ?></sup></b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class=""></i></span> &nbsp</li>
                        <li class="small"><span class="fa-li"><i class="fa fa-envelope"></i></span> Email : <?php echo $row['email_']; ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : <?php echo $row['mobile_no']; ?></li>
                        <li class="small"><span class="fa-li"><i class="fa fa-calendar"></i></span> Birth Date : <?php echo $row['bdate']; ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="dist/img/avatar5.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
              }
            ?>
          </div>
        </div>  
      </div>
      <!-- /.card -->
    </section>
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