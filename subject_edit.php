<?php
session_start();
if(isset($_SESSION["isLogin"])) {
include('connect.php');
$sql = "SELECT * FROM subjects where id = '" . $_GET['id'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

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
                    <h1 class="m-0">Subject</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Subject</li>
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
                                    <input class="form-control" type="text" placeholder="Enter Subject Name" name="sname" id="sname" value="<?php echo $row['subject_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Subject Code</label>
                                    <input class="form-control" type="text" placeholder="Enter Subject Code" name="scode" id="scode" value="<?php echo $row['subject_code']; ?>">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <input type="hidden" name="edit_id" value="<?php echo $_GET['id']; ?>">
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
<!-- /.content-wrapper --><?php include('footer.php'); 
} else {
    header('Location:index.php?msg=Unauthorized Access.!');
  }
   ?>