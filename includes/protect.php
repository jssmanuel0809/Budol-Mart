<?php

  if($_SESSION['status'] !== 'active'){
      header("location: login.php");
  } 
?>