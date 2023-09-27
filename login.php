<?php 
session_start();
include('connect.php'); 
  $uname = $_REQUEST['uname'];
  $role = $_REQUEST['role'];
      $password = $_REQUEST['password'];
      $sql = "SELECT * FROM users where username = '".$uname."' and password= '".$password."' and role= '".$role."'";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $_SESSION["isLogin"] = $row['full_name'];
        $_SESSION["role"] = $role;
        $_SESSION["userId"] = $row['id'];
        header('Location:dashboard.php');
      } else {
      header('Location:index.php?msg=Incorrent Username or password or role.! Try Again.!');
      }
