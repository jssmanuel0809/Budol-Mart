<?php 
    include('server.php');

    if (isset($_POST['get_cart'])){
        $selectedid = mysqli_real_escape_string($db, $_POST['prodid']);
        $selectedprod = mysqli_real_escape_string($db, $_POST['prodname']);
        $quantity = mysqli_real_escape_string($db, $_POST['product_quantity']);

        // print_r($selectedid . $selectedprod. $quantity);

        $product_details_query = "SELECT ProductName, Price
        FROM Products
        WHERE ProductID = '$selectedid'";
        $result = mysqli_query($db, $product_details_query);
        $data = mysqli_fetch_assoc($result);

        if ($data){
            $cart_query = "INSERT INTO ShoppingCart (ProductID, Quantity)
            VALUES ('$selectedid', '$quantity')";
            mysqli_query($db, $cart_query);

            header('location: ../cart.php');
        }

        // $product_images_query = "SELECT PI.ImageURL
        // FROM ProductImages PI
        // INNER JOIN Products P ON PI.ProductID = P.ProductID
        // WHERE P.ProductID = '$selectedid'";
        // $images = mysqli_query($db, $product_images_query);
        // $firstImage = mysqli_fetch_assoc($images);

    }
?>