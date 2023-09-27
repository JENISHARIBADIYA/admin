<?php
session_start();
include('connect.php');
$uname = $_REQUEST['uname'];
$_SESSION['uname'] = $uname;
$sql = "SELECT * FROM users where username = '" . $uname . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $otp = rand(1000, 9999);
  $sqlOtp = "UPDATE users SET otp = '$otp' WHERE username = '$uname'";
  $isUpdated = $conn->query($sqlOtp);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <?php
      if (isset($_GET['msg'])) {
        echo "<h3 style='color:red;text-align:center; font-size:20px;'>" . $_GET['msg'] . "</h3>";
      }
      ?>
      <div class="card card-outline card-primary">
        <div class="card-header text-center">

          <a href="index.php" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">You will get OTP in your Email</p>

          <form action="getPassword.php" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Enter OTP" name="otp">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>



            <!-- /.col -->
            <div class="col-6">
              <button type="submit" class="btn btn-primary btn-block">Get Password</button>
            </div>
            <!-- /.col -->
        </div>
        </form>




      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
  </body>

  </html>
<?php } else {
      echo "<h3 style='color:green;text-align:center; font-size:20px;'>" . $_GET['msg'] . "</h3>";
  header('Location:forgotpassword.php?msg=No such user found.! Try Again.!');
}
?>