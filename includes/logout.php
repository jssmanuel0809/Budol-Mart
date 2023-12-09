<?php

session_start();

session_destroy();
unset($_SESSION['username']);
unset($_SESSION['status']);
$_SESSION["logged_in"] = false;
header("location: ../index.php");

?>