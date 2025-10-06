<?php
session_start();
if(isset($_SESSION['uname'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SubCategory Add</title>

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
                            <h1 class="m-0">SubCategories</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="subcategory.php">SubCategory</a></li>
                                <li class="breadcrumb-item" active>SubCategory Add</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                    <div class="row">  
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add SubCategory</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <?php
                                    include_once("includes/config.php");
                                    $qry = "select * from categories order by id desc";
                                    $result=mysqli_query($conn, $qry) or exit("category select fail".mysqli_error($conn));
                                ?>
                                <form action="subcategory_add_db.php" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select Category Name</label>
                                            <select class="form-control" name="catid" id="catid">
                                                    <option value="" selected disabled>Select Category</option>
                                                <?php
                                                    while ($row=mysqli_fetch_array($result)) {
                                                ?>
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['catname']  ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">SubCategory Name</label>
                                            <input type="text" class="form-control" id="subcatname" name="subcatname" placeholder="Enter subcategory name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea class="form-control" name="subcatdescription" id="subcatdescription"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Select Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
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