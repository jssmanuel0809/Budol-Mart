<?php
include('server.php');
$user = $_SESSION['username'];
$select_query = "SELECT * FROM Customers
WHERE AccountName = '$user'";
$results = mysqli_query($db, $select_query);
$data = mysqli_fetch_assoc($results);
$customerid = $data['CustomerID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    // Perform the deletion in the ShoppingCart table
    $delete_query = "DELETE FROM ShoppingCart WHERE ProductID = '$product_id' AND CustomerID = '$customerid'";
    mysqli_query($db, $delete_query);

    // You can add additional checks or error handling if needed

    echo 'Product removed successfully';
}
?>
