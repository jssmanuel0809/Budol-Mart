<?php
session_start();

// initializing variables
// $username = "";
// $role = "";
// $fullname = "";
$errors = array();

// $selectedRole = "";
// $selectedName = "";
// $selectedUName = "";

// connect to the database
$db = mysqli_connect('127.0.0.1', 'root', '202117752', 'BudolDB');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
?>