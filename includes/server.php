<?php
session_start();

// initializing variables
$admin = "";
$admin_status = "";

$username = "";
$status = "";
// $logged_in = "false";
// $role = "";
// $fullname = "";
$errors = array();

// $selectedRole = "";
// $selectedName = "";
// $selectedUName = "";

// connect to the database
$db = mysqli_connect('127.0.0.1', 'root', '', 'BudolDB');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
?>