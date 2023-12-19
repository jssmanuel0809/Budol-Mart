<?php 
    include('server.php');
    if (isset($_GET['prodid'])) {
        $productID = mysqli_real_escape_string($db, $_GET['prodid']);
        $date = new DateTime(date('m.d.y'));
        $dateArc = $date->format('Y-m-d H:i:s');
        $update_query = "UPDATE Products SET ProductStatus = 'Unlisted' WHERE ProductID = '$productID'";
        mysqli_query($db, $update_query);

        $insert_query = "INSERT INTO ProductArchives (ProductID, ArchivedDate)
        VALUES ('$productID', '$dateArc')";
        mysqli_query($db, $insert_query);
    
        header('location: ../admin_area/products.php');
    } else {
        echo 'Error: Product ID not provided.';
    }
    ?>
?>