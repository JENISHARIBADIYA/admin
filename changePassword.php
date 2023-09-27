<?php
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
          <h1 class="m-0">Change Password</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Change Password</li>
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
                echo "<h3 style='color:red;text-align:center; font-size:20px;'>" . $_GET['msg'] . "</h3>";
              } else if (isset($_GET['success_msg'])) {
                echo "<h3 style='color:green;text-align:center; font-size:20px;'>" . $_GET['success_msg'] . "</h3>";
              }
              ?>
            </div>
            <!-- /.card-header -->
            <form action="savePassword.php" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="">Old Password</label>
                  <input class="form-control" type="password" placeholder="Enter Old Password" name="opass" id="opass">
                </div>
                <div class="form-group">
                  <label for="">New Password</label>
                  <input class="form-control" type="password" placeholder="Enter New Password" name="pass" id="pass">
                </div>
                <div class="form-group">
                  <label for="">Confirm Password</label>
                  <input class="form-control" type="password" placeholder="Enter Confirm Password" name="cpass" id="cpass">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="dashboard.php" class="btn btn-danger">Cancel</a>
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
<?php include('footer.php'); ?>