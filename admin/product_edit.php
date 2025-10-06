<?php
session_start();
if(isset($_SESSION['uname'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Edit</title>

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
                            <h1 class="m-0">Categories</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="products.php">products</a></li>
                                <li class="breadcrumb-item active">product Edit</li>
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
                                    <h3 class="card-title">Category Edit</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                 <?php
                                    include_once("includes/config.php");
                                    $id=$_REQUEST["id"];
                                    $qry = "select * from products where id=$id";
                                    $result=mysqli_query($conn, $qry) or exit("product select fail".mysqli_error($conn));
                                    $row=mysqli_fetch_array($result);
                                        $catqry = "select * from categories";
                                        $catresult=mysqli_query($conn, $catqry) or exit("product select fail".mysqli_error($conn));
                                 ?>
                                <form action="product_update_db.php" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select Category Name</label>
                                            <select class="form-control" name="catid" id="catid">
                                                    <option value="" selected disabled>Select Category</option>
                                                <?php
                                                    while ($catrow=mysqli_fetch_array($catresult)) {
                                                ?>
                                                    <option value="<?php echo $catrow['id'] ?>" <?php echo $row['catid']==$catrow['id']?"selected":"" ?> ><?php echo $catrow['catname']  ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select SubCategory Name</label>
                                            <select class="form-control" name="subcatid" id="subcatid">
                                                    <option value="" selected disabled>Select Category First...</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" class="form-control" id="productname" name="productname" placeholder="Enter product name.." value="<?php echo $row['productname']; ?>">
                                            <input type="hidden" name="id" value="<?php echo $row['id'];  ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Price</label>
                                            <input type="number" min="1" class="form-control" id="productprice" name="productprice" placeholder="Enter product price..." value="<?php echo $row['productprice']; ?>">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Description</label>
                                            <textarea class="form-control" name="productdescription" id="productdescription"><?php echo $row['productdescription']; ?></textarea>
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
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Old Image</label><br>
                                            <input type="hidden" name="oldimage" value="<?php echo $row['image']; ?>">
                                            <img src="../images_/products/<?php echo $row['image']; ?>" alt="" width="300px">
                                        </div
                                    </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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

    <script>
        $(document).ready(function(){
            $("#catid").change(function(){
                var catid=$(this).val();
                $.ajax({
                    url:"getsubcat.php",
                    type:"GET",
                    data:{
                        "id":catid
                    },
                    success:function(result){
                        $("#subcatid").html(result);
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php
}else{
  $_SESSION["error"] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>