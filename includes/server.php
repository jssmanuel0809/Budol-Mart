<?php
session_start();
$admin = "";
$admin_status = "";
$username = "";
$status = "";
$errors = array();
$db = mysqli_connect('127.0.0.1', 'root', '', 'BudolDB');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
?>