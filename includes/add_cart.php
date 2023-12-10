<?php 
    include('server.php');
    $user = $_SESSION['username'];
    $select_query = "SELECT * FROM Customers
    WHERE AccountName = '$user'";
    $results = mysqli_query($db, $select_query);
    $data = mysqli_fetch_assoc($results);
    $customerid = $data['CustomerID'];

    if (isset($_POST['get_cart'])){
        $selectedid = mysqli_real_escape_string($db, $_POST['prodid']);
        $selectedprod = mysqli_real_escape_string($db, $_POST['prodname']);
        $quantity = mysqli_real_escape_string($db, $_POST['product_quantity']);

        // print_r($selectedid . $selectedprod. $quantity);

        // $product_details_query = "SELECT ProductName, Price
        // FROM Products
        // WHERE ProductID = '$selectedid'";
        // $result = mysqli_query($db, $product_details_query);
        // $data = mysqli_fetch_assoc($result);

        //check if product already in cart
        $cart_details = "SELECT * FROM ShoppingCart
        WHERE CustomerID = '$customerid' AND ProductID = '$selectedid'";
        $exst = mysqli_query($db, $cart_details);
        $curr = mysqli_fetch_assoc($exst);
        if ($curr){
            $curr_qty = $curr['Quantity'];
            $upd_qty = $quantity + $curr_qty;

            $cart_upd = "UPDATE ShoppingCart
            SET Quantity = '$upd_qty'
            WHERE CustomerID = '$customerid' AND ProductID = '$selectedid'";
            mysqli_query($db, $cart_upd);
        }
        else{
            $cart_query = "INSERT INTO ShoppingCart (CustomerID, ProductID, Quantity)
            VALUES ('$customerid', '$selectedid', '$quantity')";
            mysqli_query($db, $cart_query);
        }

        header('location: ../cart.php');

        // $product_images_query = "SELECT PI.ImageURL
        // FROM ProductImages PI
        // INNER JOIN Products P ON PI.ProductID = P.ProductID
        // WHERE P.ProductID = '$selectedid'";
        // $images = mysqli_query($db, $product_images_query);
        // $firstImage = mysqli_fetch_assoc($images);

    }
?>