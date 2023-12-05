<?php
// Include your database connection file or establish a connection here
include('server.php');

// Check if the image URL is provided in the POST request
if (isset($_POST['imageURL'])) {
    $imageURL = mysqli_real_escape_string($db, $_POST['imageURL']);

    // Query to remove the image from the database
    $deleteImageQuery = "DELETE FROM ProductImages WHERE ImageURL = '$imageURL'";
    $deleteImageResult = mysqli_query($db, $deleteImageQuery);

    if ($deleteImageResult) {
        // Optionally, you can also unlink (delete) the image file from your server
        // Uncomment the line below if you want to delete the file
        // unlink($imageURL);

        echo "Image removed successfully";
    } else {
        echo "Error removing the image";
        // Handle the error as needed
    }
} else {
    echo "Image URL not provided";
    // Handle the case where the image URL is not provided in the request
}
?>
