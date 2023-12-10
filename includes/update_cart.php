<?php
include('server.php');
$user = $_SESSION['username'];
$select_query = "SELECT * FROM Customers
WHERE AccountName = '$user'";
$results = mysqli_query($db, $select_query);
$data = mysqli_fetch_assoc($results);
$customerid = $data['CustomerID'];

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Update the quantity in the ShoppingCart table
    $update_query = "UPDATE ShoppingCart SET Quantity = '$quantity' WHERE ProductID = '$product_id' AND CustomerID = '$customerid'";
    mysqli_query($db, $update_query);
}
?>
