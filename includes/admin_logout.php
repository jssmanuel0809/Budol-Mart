<?php

session_start();
session_destroy();
unset($_SESSION['admin']);
unset($_SESSION['admin_status']);
$_SESSION["logged_in"] = false;
header("location: ../admin_area/login.php");
?>