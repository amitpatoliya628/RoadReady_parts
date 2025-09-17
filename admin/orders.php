<?php
session_start();
if(isset($_SESSION['uname'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Orders</title>

  <!-- add your style here -->
   <?php
      include_once("includes/style.php");
   ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                            <h1 class="m-0">Orders</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                                <li class="breadcrumb-item active">Orders</li>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Orders list</b></h3>
                                    <a href="Orders_add.php"><button class="btn btn-primary float-right">Add Me</button></a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email ID</th>
                                        <th>Address</th>
                                        <th>Payment Method</th>
                                        <th>Total Price</th>
                                        <th>Order Date</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include_once("includes/config.php");
                                            $qry = "select * from orders order by id desc";
                                            $result=mysqli_query($conn, $qry) or exit("Order select fail".mysqli_error($conn));
                                            while ($row=mysqli_fetch_array($result)) {

                                               
                                            ?>
                                            <tr>
                                                <td><?php  echo $row['order_number']; ?></td>
                                                <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                                <td><?php  echo $row['phone']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php  echo $row['address1']." ".$row['address2'].",<br> ".$row['country'].", ".$row['state'].", ".$row['city'].", ".$row['pincode']; ?></td>
                                                <td><?php echo $row['payment_method']; ?></td>
                                                <td><?php  echo $row['total']; ?></td>
                                                <td><?php echo $row['order_date']; ?></td>
                                                <td>
                                                    <a href="product_delete.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>&nbsp &nbsp  &nbsp &nbsp
                                                    <a href="product_edit.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></td></a>
                                            </tr>
                                            <?php
                                            }
                                        ?>
                                    

                                  </tbody>
                                  <tfoot>
                                  <tr>
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email ID</th>
                                    <th>Address</th>
                                    <th>Payment Method</th>
                                    <th>Total Price</th>
                                    <th>Order Date</th>
                                    <th>action</th>
                                  </tr>
                                  </tfoot>
                                </table>
                              </div>
                              <!-- /.card-body -->
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

    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Page specific script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
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