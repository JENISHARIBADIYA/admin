<?php
include('connect.php');
$opass = $_REQUEST['opass'];
$pass = $_REQUEST['pass'];
$cpass = $_REQUEST['cpass'];

$old_password_sql = "SELECT * FROM users where password='$opass'";
$old_password_result = $conn->query($old_password_sql);

if ($old_password_result->num_rows > 0) {
  if ($pass != $cpass) {
    header('Location:changePassword.php?msg=Confirm password does not match with password.!');
  } else {
    $sql = "UPDATE users SET password='$pass' where password='$opass'";
    if ($conn->query($sql) === TRUE) {
      header('Location:changePassword.php?success_msg=Password changed Successfully.!');
    } else {
      header('Location:changePassword.php?msg=Error in change password.!');
    }
  }
} else {
  header('Location:changePassword.php?msg=Incorrect old password.!');
}
