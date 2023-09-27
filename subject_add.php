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
                    <h1 class="m-0">Subjects</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Subject</li>
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
                        <form action="subject_save.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Subject Name</label>
                                    <input class="form-control" type="text" placeholder="Enter Subject Name" name="sname" id="sname">
                                </div>
                                <div class="form-group">
                                    <label for="">Subject Code</label>
                                    <input class="form-control" type="text" placeholder="Enter Subject Code" name="scode" id="scode">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="subjects.php" class="btn btn-danger">Cancel</a>
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
</div>
<!-- /.content-wrapper -->
<?php include('footer.php'); 
} else {
  header('Location:index.php?msg=Unauthorized Access.!');
}
 ?>