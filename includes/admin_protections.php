<?php


  if($_SESSION['admin_status'] !== 'active'){
      header("location: ../admin_area/products.php");
  } 
?>