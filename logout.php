<?php
session_start();
unset($_SESSION["isLogin"]);
header('Location:index.php?msg=You have logout successfully.');
