<?php
// include('../includes/server.php');

// //ADD PRODUCTS FUNCTION
// if (isset($_POST['add_products'])){
//     //VARIABLES
//     $imgext_val = "false";
//     $prodname = mysqli_real_escape_string($db, $_POST['prodname']);
//     $price = $_POST['price'];
//     $description = mysqli_real_escape_string($db, $_POST['desc']);
//     $type = $_POST['type'];
//     $status = mysqli_real_escape_string($db, "Active");
//     $brand = $_POST['brand'];
//     $series = $_POST['series'];
//     $stocks = $_POST['stocks'];
//     $date = new DateTime(date('m.d.y'));
//     $dateUpd = $date->format('Y-m-d H:i:s');
//     $tagsInput = mysqli_real_escape_string($db, $_POST['tags']);
//     $tagsArray = explode(',', $tagsInput);

//     //IMAGE VALIDATION
//     if (isset($_FILES['imageone'])){
//         $imageone = $_FILES['imageone'];
//         $imgonefile = $imageone['name'];
//         $imgonetemp = $imageone['tmp_name'];
    
//         $filename_sep = explode('.', $imgonefile);
//         $file_ext = strtolower(end($filename_sep));
    
//         $ext = array('jpeg', 'jpg', 'png');
//         if(in_array($file_ext, $ext)){
//             $imgext_val = "true";
//         }
//     }
//     //INPUT VALIDATION
//     //if all input is filled

//     //DUPLICATE PRODUCTS VALIDATION
//     //redo validation for brand and series
//     $products_check_query = "SELECT * FROM Products
//     WHERE ProductName = '$prodname' AND ProductType = '$type'";
//     $result = mysqli_query($db, $products_check_query);
//     $prod = mysqli_fetch_assoc($result);
//     if ($prod){
//         array_push($errors, "Duplicate product detected.");
//     }

//     //INSERTION
//     if(count($errors) == 0){
//         $brands_query = "SELECT * FROM Brands
//         WHERE Brand = '$brand'";
//         $result = mysqli_query($db, $brands_query);
//         $brnd = mysqli_fetch_assoc($result);
//         $brndID = $brnd['BrandID'];

//         $series_query = "SELECT SeriesID FROM Series S
//         WHERE Series = '$series'";
//         $result = mysqli_query($db, $series_query);
//         $srs = mysqli_fetch_assoc($result);
//         $srsID = $srs['SeriesID'];
            
//         $insert_query = "INSERT INTO Products (ProductName, Price, ProductDescription, ProductType, BrandID, SeriesID, ProductStatus)
//         VALUES ('$prodname', '$price', '$description', '$type', '$brndID', '$srsID', '$status')";
//         $working = mysqli_query($db, $insert_query);

//         if($working){

//             $products_check_query = "SELECT * FROM Products
//             WHERE ProductName = '$prodname' AND ProductType = '$type'";
//             $result = mysqli_query($db, $products_check_query);
//             $prod = mysqli_fetch_assoc($result);
//             $prodID = $prod['ProductID'];

//             $insert_query = "INSERT INTO Inventory (ProductID, Quantity, DateUpdated)
//             VALUES ('$prodID', '$stocks', '$dateUpd')";
//             mysqli_query($db, $insert_query);

//             foreach ($tagsArray as $tag) {
//                 $tag = mysqli_real_escape_string($db, $tag);
//                 $tags_query = "INSERT INTO ProductTags (ProductID, TagName)
//                 VALUES ('$prodID', '$tag')";
//                 mysqli_query($db, $tags_query);
//             }

//             if ($imgext_val == "true") {
//                 // $upload_directory = '/Applications/XAMPP/xamppfiles/htdocs/Budol-Mart/admin_area/product_images';
//                 // if (!is_dir($upload_directory)) {
//                 //     mkdir($upload_directory, 0777, true);
//                 // }
//                 // $upload_image = $upload_directory . '/' . $imgonefile;

//                 $upload_image = "product_images/".$imgonefile;
//                 // move_uploaded_file($imgonetemp, $upload_image);

//                 if (move_uploaded_file($imgonetemp, $upload_image)) {
//                     $insert_query = "INSERT INTO ProductImages (ProductID, ImageURL)
//                     VALUES ('$prodID', '$upload_image')";
//                     mysqli_query($db, $insert_query);
//                 } else {
//                     echo 'File upload failed with error code ' . $_FILES['imageone']['error'];
//                 }
//             }
//         }

//         header('location: index.php');
//     }

// }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Products | BUDOL</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/add_form.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&family=Righteous&display=swap" rel="stylesheet">
        <!-- COMPONENTS -->
        <script src="../components/admin_header.js" type="text/javascript" defer></script>
        <!-- SCRIPT -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <header-component></header-component>

        <section class="content">
            <h1>ADD PRODUCTS</h1>
            <div class="form_box">
                <form class="products_form" action="add_products.php" method="post" enctype="multipart/form-data">
                    <?php //include('../includes/errors.php') ?>
                    <label for="">Product Name</label><input type="text" name="prodname" required>
                    <label for="">Product Price</label><input type="text" name="price" required>
                    <label for="">Product Stocks</label><input type="text" name="stocks" required>
                    <label for="">Product Description</label><textarea rows="10" cols="50" class="product-desc" name="desc" required></textarea>
                    <label for="">Product Tags</label><input type="text" name="tags">
                    <label for="">Product Type</label>
                        <select name="type">
                            <option value="Regular">Regular</option>
                            <option value="Limited">Limited</option>
                        </select>
                    <label for="">Product Brand</label>
                        <select name="brand" id="brandDropdown">
                            <?php
                            // $select_query = "SELECT Brand FROM Brands";
                            // $results = mysqli_query($db, $select_query);
                            // $row = mysqli_num_rows($results);
                            // if ($row > 0){
                            //     while($data = mysqli_fetch_assoc($results)){
                            //         echo '<option value="' . $data['Brand'] . '">' . $data['Brand'] . '</option>';
                            //     }
                            // }
                            ?>
                        </select>
                    <label for="">Product Series</label>
                        <select name="series" id="seriesDropdown">
                        </select>
                    <div class="product-image">
                        <label for="">Product Image 1</label><input type="file" name="imageone">
                        <label for="">Product Image 4</label><input type="file" accept="image/*">
                        <label for="">Product Image 7</label><input type="file" accept="image/*">
                    </div>
                    <div class="product-image">
                        <label for="">Product Image 2</label><input type="file" accept="image/*">
                        <label for="">Product Image 5</label><input type="file" accept="image/*">
                        <label for="">Product Image 8</label><input type="file" accept="image/*">
                    </div>
                    <div class="product-image">
                        <label for="">Product Image 3</label><input type="file" accept="image/*">
                        <label for="">Product Image 6</label><input type="file" accept="image/*">
                        <label for="">Product Image 9</label><input type="file" accept="image/*">
                    </div>
                    <button class="add_button" type="submit" name="add_products">Add Product</button>
                </form>
            </div>
        </section>

        <script>
            $(document).ready(function () {
                // Function to populate series dropdown based on selected brand
                function populateSeriesDropdown() {
                    var selectedBrand = $("#brandDropdown").val();

                    // Use AJAX to fetch series options from the server
                    $.ajax({
                        url: '../includes/get_series.php',  // Replace with the actual PHP script to fetch series
                        type: 'POST',
                        data: { brand: selectedBrand },
                        success: function (response) {
                            // Update the series dropdown with new options
                            $("#seriesDropdown").html(response);
                        }
                    });
                }

                // Event listener for brand dropdown change
                $("#brandDropdown").on("change", function () {
                    // Call the function to populate series dropdown on brand change
                    populateSeriesDropdown();
                });

                // Initial population of series dropdown when the page loads
                populateSeriesDropdown();
            });
        </script>

    </body>
</html>
