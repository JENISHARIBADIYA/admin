<?php 
session_start();
  include('connect.php'); 
  $otp = $_REQUEST['otp']; 
  $sql = "SELECT * FROM users where username = '".$_SESSION['uname']."' and otp='$otp'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
        // password sent code here.
          header('Location:index.php?success_msg=We have sent your password in mail please check.');
  } else {
       header('Location:forgotpassword.php?msg=Invalid OTP.! Try Again.!');
  }
