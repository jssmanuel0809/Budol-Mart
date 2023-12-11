<?php
session_start();

  if($_SESSION['admin_status'] !== 'active'){
      header("location: ../admin_area/products.php");
  } 
?>