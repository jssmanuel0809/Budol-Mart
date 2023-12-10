<?php
session_start();

  if($_SESSION['status'] !== 'active'){
      header("location: login.php");
  } 
?>