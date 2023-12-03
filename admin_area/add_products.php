<?php

include('../includes/server.php');

//add function
if (isset($_POST['add_products'])){
    $imgext_val = "false";

    $prodname = mysqli_real_escape_string($db, $_POST['prodname']);
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($db, $_POST['desc']);
    $type = $_POST['type'];
    $status = mysqli_real_escape_string($db, "Active");

    // $brand = $_POST['brand'];
    // $series = $_POST['series'];

    $stocks = $_POST['stocks'];
    $date = new DateTime(date('m.d.y'));
    $dateUpd = $date->format('Y-m-d H:i:s');

    // $tags

    

    if (isset($_FILES['imageone'])){
        // $imageone = $_FILES['imageone']['name'];
        // $tmp_imageone = $_FILES['imageone']['tmp_name'];

        $imageone = $_FILES['imageone'];
        $imgonefile = $imageone['name'];
        $imgonetemp = $imageone['tmp_name'];
    
        $filename_sep = explode('.', $imgonefile);
        $file_ext = strtolower(end($filename_sep));
    
        $ext = array('jpeg', 'jpg', 'png');
        if(in_array($file_ext, $ext)){
            $imgext_val = "true";
        }
    }

    // print_r($imageone);
    // echo "<br>";
    // print_r($tmp_imageone);
    // echo "<br>";

    print_r($imageone);
    echo "<br>";
    print_r($imgonefile);
    echo "<br>";
    print_r($imgonetemp);
    echo "<br>";

    print_r($filename_sep);
    echo "<br>";
    print_r($file_ext);
    echo "<br>";
    print_r($imgext_val);

    // $imagetwo
    // $imagethree
    // $imagefour
    // $imagefive
    // $imagesix
    // $imageseven
    // $imageeight
    // $imagenine

    //product validation

    //duplicate validation
    // $products_check_query = "SELECT * FROM Products
    // WHERE ProductName = '$prodname' AND ProductType = '$type' AND Brand = '$brand' AND Series = '$series'";
    // $result = mysqli_query($db, $products_check_query);
    // $prod = mysqli_fetch_assoc($result);
    // if ($prod){
    //     array_push($errors, "Duplicate product detected.");
    // }

    //insertion
    if(count($errors) == 0){
        print_r("working1");
        $insert_query = "INSERT INTO Products (ProductName, Price, ProductDescription, ProductType, ProductStatus)
        VALUES ('$prodname', '$price', '$description', '$type', '$status')";
        $working = mysqli_query($db, $insert_query);

        if($working){
            print_r("working2");
            $products_check_query = "SELECT * FROM Products
            WHERE ProductName = '$prodname' AND ProductType = '$type'";
            $result = mysqli_query($db, $products_check_query);
            $prod = mysqli_fetch_assoc($result);
            $prodID = $prod['ProductID'];

            $insert_query = "INSERT INTO Inventory (ProductID, Quantity, DateUpdated)
            VALUES ('$prodID', '$stocks', '$dateUpd')";
            mysqli_query($db, $insert_query);

            print_r("working3");

            if ($imgext_val == "true") {
                print_r("working4");

                $upload_image = 'product_images/'.$imgonefile;
                move_uploaded_file($imgonetemp, $upload_image);
                // move_uploaded_file($tmp_imageone, "./product_images/$imageone");

                if ($_FILES['imageone']['error'] != UPLOAD_ERR_OK) {
                    print_r("upload_not_working");
                    // die('File upload failed with error code ' . $_FILES['imageone']['error']);
                }
                $insert_query = "INSERT INTO ProductImages (ProductID, ImageURL)
                VALUES ('$prodID', '$upload_image')";
                mysqli_query($db, $insert_query);
            }
        }

        //header('location: index.php');
    }

}
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
        <!-- COMPONENTS -->
        <script src="../components/admin_header.js" type="text/javascript" defer></script>
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <!-- <header-component></header-component> -->

        <section class="content">
            <h1>ADD PRODUCTS</h1>
            <div class="form_box">
                <form class="products_form" action="add_products.php" method="post" enctype="multipart/form-data">
                    <?php include('../includes/errors.php') ?>
                    <label for="">Product Name</label><input type="text" name="prodname" required>
                    <label for="">Product Price</label><input type="text" name="price" required>
                    <label for="">Product Stocks</label><input type="text" name="stocks" required>
                    <label for="">Product Description</label><textarea rows="10" cols="50" class="product-desc" name="desc" required></textarea>
                    <!-- <label for="">Product Tags</label><input type="text"> -->
                    <label for="">Product Type</label>
                        <select name="type">
                            <option value="regular">Regular</option>
                            <option value="limited">Limited</option>
                        </select>
                    <label for="">Product Brand</label>
                        <select name="brand">
                            <option value="brand1">Brand 1</option>
                            <option value="brand2">Brand 2</option>
                            <option value="brand3">Brand 3</option>
                        </select>
                    <label for="">Product Series</label>
                        <select name="series">
                            <option value="series1">Series 1</option>
                            <option value="series2">Series 2</option>
                            <option value="series3">Series 3</option>
                        </select>
                    <div class="product-image">
                        <label for="">Product Image 1</label><input type="file" name="imageone">
                        <!-- <label for="">Product Image 4</label><input type="file" accept="image/*">
                        <label for="">Product Image 7</label><input type="file" accept="image/*"> -->
                    </div>
                    <!-- <div class="product-image">
                        <label for="">Product Image 2</label><input type="file" accept="image/*">
                        <label for="">Product Image 5</label><input type="file" accept="image/*">
                        <label for="">Product Image 8</label><input type="file" accept="image/*">
                    </div>
                    <div class="product-image">
                        <label for="">Product Image 3</label><input type="file" accept="image/*">
                        <label for="">Product Image 6</label><input type="file" accept="image/*">
                        <label for="">Product Image 9</label><input type="file" accept="image/*">
                    </div> -->
                    <button class="add_button" type="submit" name="add_products">Add Product</button>
                </form>
            </div>
        </section>

    </body>
</html>