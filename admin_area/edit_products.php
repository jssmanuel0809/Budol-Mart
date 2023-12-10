<?php
    include('../includes/server.php');
    include('../includes/admin_protections.php');

    //PRODUCT DETAILS PHP CODE
    if (isset($_POST['get_prod'])){

        $selectedid = mysqli_real_escape_string($db, $_POST['prodid']);
        $selectedprod = mysqli_real_escape_string($db, $_POST['prodname']);

        $product_details_query = "SELECT P.ProductID, P.ProductName, B.Brand, S.Series, P.Price, P.ProductDescription, P.ProductTags, P.ProductType, I.Quantity
        FROM Products P
        INNER JOIN Inventory I ON P.ProductID = I.ProductID
        INNER JOIN Brands B ON P.BrandID = B.BrandID
        INNER JOIN Series S ON P.SeriesID = S.SeriesID
        WHERE P.ProductID = '$selectedid'";
        $result = mysqli_query($db, $product_details_query);
        $data = mysqli_fetch_assoc($result);

        $type = $data['ProductType'];
        $brand = $data['Brand'];
        $series = $data['Series'];

        $product_images_query = "SELECT PI.ImageURL
        FROM ProductImages PI
        INNER JOIN Products P ON PI.ProductID = P.ProductID
        WHERE P.ProductID = '$selectedid'";
        $images = mysqli_query($db, $product_images_query);
        $img = mysqli_fetch_assoc($images);
    }

    if (isset($_POST['edit_products'])){

        $imgext_val = "false";
        $selectedid = mysqli_real_escape_string($db, $_POST['prodid']);
        $prodname = mysqli_real_escape_string($db, $_POST['prodname']);
        $price = $_POST['price'];
        $description = mysqli_real_escape_string($db, $_POST['desc']);
        $tags = mysqli_real_escape_string($db, $_POST['tags']);
        $type = $_POST['type'];
        $stocks = $_POST['stocks'];

        $brand = mysqli_real_escape_string($db, $_POST['brand']);
        $series = mysqli_real_escape_string($db, $_POST['series']);

        $brands_query = "SELECT * FROM Brands
        WHERE Brand = '$brand'";
        $result = mysqli_query($db, $brands_query);
        $brnd = mysqli_fetch_assoc($result);
        $brndID = $brnd['BrandID'];

        $series_query = "SELECT SeriesID FROM Series S
        WHERE Series = '$series' AND BrandID = '$brndID'";
        $result = mysqli_query($db, $series_query);
        $srs = mysqli_fetch_assoc($result);
        $srsID = $srs['SeriesID'];

        $update_query = "UPDATE Products
        SET ProductName = '$prodname', Price = '$price', ProductDescription = '$description',
        ProductTags = '$tags', ProductType = '$type', BrandID = '$brndID', SeriesID = '$srsID'
        WHERE ProductID = '$selectedid'";
        mysqli_query($db, $update_query);

        $update_query = "UPDATE Inventory
        SET Quantity = '$stocks'
        WHERE ProductID = '$selectedid'";
        mysqli_query($db, $update_query); 

        //IMAGE VALIDATION
        if (isset($_FILES['images'])) {
            $originalSelectedID = mysqli_real_escape_string($db, $_POST['prodid']);
            $images = $_FILES['images'];
        
            foreach ($images['tmp_name'] as $key => $tmp_name) {
                $imgfile = $images['name'][$key];
                $imgtemp = $tmp_name;
        
                $filename_sep = explode('.', $imgfile);
                $file_ext = strtolower(end($filename_sep));
        
                $ext = array('jpeg', 'jpg', 'png');
                if (in_array($file_ext, $ext)) {
                    $imgext_val = "true"; // Move this line inside the loop
                } else {
                    $imgext_val = "false"; // Set it to false if the extension is not valid
                }
        
                if ($imgext_val == "true") {
                    $upload_image = "product_images/" . $imgfile;
        
                    if (move_uploaded_file($imgtemp, $upload_image)) {
                        $insert_query = "INSERT INTO ProductImages (ProductID, ImageURL)
                            VALUES ('$originalSelectedID', '$upload_image')";
                        mysqli_query($db, $insert_query);
                    } else {
                        echo 'File upload failed with error code ' . $images['error'][$key];
                    }
                }
            }
        }

        // IMAGE REMOVAL
        if (isset($_POST['r_image'])) {
            $selectedid = mysqli_real_escape_string($db, $_POST['prodid']);
            $selectedImages = $_POST['r_image'];

            foreach ($selectedImages as $removedImageID) {
                $delete_query = "DELETE FROM ProductImages WHERE ProductID = '$selectedid' AND ImageID = '$removedImageID'";
                mysqli_query($db, $delete_query);
            }
        }

        header('location: products.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit Products | BUDOL</title>
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
            <h1>EDIT PRODUCTS</h1>
            <div class="form_box">
                <form class="products_form" action="edit_products.php" method="post" enctype="multipart/form-data">
                    <?php //include('../includes/errors.php') ?>
                    <input type="text" name="prodid" value="<?php echo $selectedid ?>" readonly hidden>
                    <label for="">Product Name</label><input type="text" name="prodname" value="<?php echo $data['ProductName'] ?>" required>
                    <label for="">Product Price</label><input type="text" name="price" value="<?php echo $data['Price'] ?>"  required>
                    <label for="">Product Stocks</label><input type="text" name="stocks" value="<?php echo $data['Quantity'] ?>" required>
                    <label for="">Product Description</label><textarea rows="10" cols="50" class="product-desc" name="desc"  required><?php echo $data['ProductDescription'] ?></textarea>
                    <label for="">Product Tags</label><input type="text" name="tags" value="<?php echo $data['ProductTags']; ?>">
                    <label for="">Product Type</label>
                        <select name="type" id="typeDropdown">
                            <option value="Regular" <?php echo ($type == 'Regular') ? 'selected' : ''; ?>>Regular</option>
                            <option value="Limited" <?php echo ($type == 'Limited') ? 'selected' : ''; ?>>Limited</option>
                        </select>
                    <label for="">Product Brand</label>
                        <select name="brand" id="brandDropdown">
                            <?php
                            $select_query = "SELECT Brand FROM Brands";
                            $results = mysqli_query($db, $select_query);
                            $row = mysqli_num_rows($results);
                            if ($row > 0){
                                while($data = mysqli_fetch_assoc($results)){
                                    $selected = ($brand == $data['Brand']) ? 'selected' : '';
                                    echo '<option value="' . $data['Brand'] . '" ' . $selected . '>' . $data['Brand'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    <label for="">Product Series</label>
                        <select name="series" id="seriesDropdown">
                        </select>
                    <div class="product-image">
                        <label for="">Add Product Images</label><input type="file" accept="image/*" name="images[]" multiple>
                    </div>
                    <div class="product-image">
                        <!-- Checkbox list for image removal -->
                        <label for="">Remove Product Images</label>
                        <?php
                        $product_images_query = "SELECT ImageID, ImageURL
                            FROM ProductImages
                            WHERE ProductID = '$selectedid'";
                        $images = mysqli_query($db, $product_images_query);
                        while ($img = mysqli_fetch_assoc($images)) {
                            echo '
                                <div class="remove-images-button">
                                    <img src="' . $img['ImageURL'] . '" class="product_images">
                                    <input type="checkbox" name="r_image[]" value="' . $img['ImageID'] . '"> Remove Image
                                </div>';
                        }
                        ?>
                    </div>
                    <button class="add_button" type="submit" name="edit_products">Edit Product</button>
                </form>
            </div>
        </section>

        <script>
            $(document).ready(function () {
                function populateSeriesDropdown() {
                    var selectedBrand = $("#brandDropdown").val();
                    $.ajax({
                        url: '../includes/get_series.php',
                        type: 'POST',
                        data: { brand: selectedBrand,
                            series: '<?php echo $series; ?>' },
                        success: function (response) {
                            $("#seriesDropdown").html(response);
                        }
                    });
                }
                $("#brandDropdown").on("change", function () {
                    populateSeriesDropdown();
                });
                populateSeriesDropdown();
            });
        </script>

    </body>
</html>