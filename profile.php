<?php
session_start();
if(isset($_SESSION["isLogin"])) {
include('connect.php');
include('connect.php');
include('header.php');
include('sidebar.php');
$sql = "SELECT * FROM users where id = '" . $_SESSION["userId"] . "'";
$result_profile = $conn->query($sql);
if ($result_profile->num_rows > 0) {
  $row_profile = $result_profile->fetch_assoc();
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
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
                echo "<h3 style='color:green;text-align:center; font-size:20px;'>" . $_GET['msg'] . "</h3>";
              }
              ?>
            </div>
            <!-- /.card-header -->
              <form action="save_profile.php" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="form-group">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="<?php echo $row_profile['image']; ?>" alt="User profile picture">
                      </div>
                  </div>
                   <div class="form-group">
                    <label for="">Upload Photo</label>
                     <input class="form-control" type="file" placeholder="" name="photo" id="photo">
                  </div>
                  <div class="form-group">
                    <label for="">Full Name</label>
                     <input class="form-control" type="text" placeholder="Enter Full Name" name="fullname" id="fullname" value="<?php echo $row_profile['full_name']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                  <input class="form-control" type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo $row_profile['username']; ?>">
                </div>
                <div class="form-group">
                  <label for="">skill</label>
                  <input class="form-control" type="text" placeholder="Enter skill" name="skill" id="skill" maxlength="10" value="<?php echo $row_profile['skill']; ?>">
                </div>
                <div class="form-group">
                  <label for="">Contact</label>
                  <input class="form-control" type="number" placeholder="Enter contact" name="contact" id="contact" maxlength="10" value="<?php echo $row_profile['contact']; ?>">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
<?php include('footer.php'); 
} else {
  header('Location:index.php?msg=Unauthorized Access.!');
}
 ?>