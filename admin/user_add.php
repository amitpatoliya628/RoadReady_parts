<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add New User</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
              <li class="breadcrumb-item active">New User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
           <div class="col-md-2"></div>
          <div class="col-md-8">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">User Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <span class="col-sm-1"></span>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name : </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <span class="col-sm-1"></span>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email : </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <span class="col-sm-1"></span>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile No : </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <span class="col-sm-1"></span>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Birth Date : </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <span class="col-sm-1"></span>
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password : </label>
                            <div class="col-sm-8">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <span class="col-sm-1"></span>
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Conform Password : </label>
                            <div class="col-sm-8">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Sign in</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
</div>

    <!-- add footer here -->
     <?php
      include_once("includes/footer.php");
    ?>
  
    <!-- add script here -->
    <?php
      include_once("includes/script.php");
    ?>

    <script>
        $(function () {
        bsCustomFileInput.init();
        });
    </script>

</body>
</html>
