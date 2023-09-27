<?php
session_start();
if(isset($_SESSION["isLogin"])) {
include('connect.php');
include('header.php');
include('sidebar.php');
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
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Add categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php
                            if (isset($_GET['msg'])) {
                                echo "<h3 style='color:red;text-align:center;'>" . $_GET['msg'] . "</h3>";
                            }
                            ?>
                        </div>
                        <!-- /.card-header -->
                        <form action="cat_save.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Categories Name</label>
                                    <input class="form-control" type="text" placeholder="Enter Categories Name"
                                        name="fname" id="fname">
                                </div>






                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div class="custom-control custom-radio">

                                        <input class="custom-control-input" type="radio" id="customRadio1" name="status"
                                            value="1">
                                        <label for="customRadio1" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">

                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status"
                                            value="0">
                                        <label for="customRadio2" class="custom-control-label">In Active</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="categories.php" class="btn btn-danger">Cancel</a>
                            </div>

                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('footer.php'); 
} else {
  header('Location:index.php?msg=Unauthorized Access.!');
}
 ?>