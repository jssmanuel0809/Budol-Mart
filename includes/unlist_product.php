<?php 
    include('server.php');

    if (isset($_POST['get_prod'])){

        $selectedid = mysqli_real_escape_string($db, $_POST['prodid']);
        $selectedprod = mysqli_real_escape_string($db, $_POST['prodname']);

        $product_details_query = "SELECT ProductID
        FROM Products P
        WHERE ProductID = '$selectedid'";
        $result = mysqli_query($db, $product_details_query);
        $data = mysqli_fetch_assoc($result);
        $prodid = $data['ProductID'];
        $prodstat = mysqli_real_escape_string($db, "Unlisted");
        $date = new DateTime(date('m.d.y'));
        $dateArc = $date->format('Y-m-d H:i:s');

        $insert_query = "INSERT INTO ProductArchives (ProductID, ArchivedDate)
        VALUES ('$prodid', '$dateArc')";
        $working = mysqli_query($db, $insert_query);

        if ($working){
            $update_query = "UPDATE Products
            SET ProductStatus = '$prodstat'
            WHERE ProductID = '$prodid'";
            mysqli_query($db, $update_query);
        }

        header('location: ../admin_area/products.php');
    }
?>