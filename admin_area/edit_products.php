<?php
    include('../includes/server.php');

    //PRODUCT DETAILS PHP CODE
    if (isset($_POST['get_prod'])){

        $selectedid = mysqli_real_escape_string($db, $_POST['prodid']);
        $selectedprod = mysqli_real_escape_string($db, $_POST['prodname']);

        $product_details_query = "SELECT P.ProductID, P.ProductName, B.Brand, S.Series, P.Price, P.ProductDescription, P.ProductType, I.Quantity
        FROM Products P
        INNER JOIN Inventory I ON P.ProductID = I.ProductID
        INNER JOIN Brands B ON P.BrandID = B.BrandID
        INNER JOIN Series S ON P.SeriesID = S.SeriesID
        WHERE P.ProductID = '$selectedid'";
        $result = mysqli_query($db, $product_details_query);
        $data = mysqli_fetch_assoc($result);

        $product_images_query = "SELECT PI.ImageURL
        FROM ProductImages PI
        INNER JOIN Products P ON PI.ProductID = P.ProductID
        WHERE P.ProductID = '$selectedid'";
        $images = mysqli_query($db, $product_images_query);
        $img = mysqli_fetch_assoc($images);
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
                    <label for="">Product Name</label><input type="text" name="prodname" value="<?php echo $data['ProductName'] ?>" required>
                    <label for="">Product Price</label><input type="text" name="price" value="<?php echo $data['Price'] ?>"  required>
                    <label for="">Product Stocks</label><input type="text" name="stocks" required>
                    <label for="">Product Description</label><textarea rows="10" cols="50" class="product-desc" name="desc"  required><?php echo $data['ProductDescription'] ?></textarea>
                    <label for="">Product Tags</label><input type="text" name="tags">
                    <label for="">Product Type</label>
                        <select name="type">
                            <option value="Regular">Regular</option>
                            <option value="Limited">Limited</option>
                        </select>
                    <label for="">Product Brand</label>
                        <select name="brand" id="brandDropdown">
                            <?php
                            $select_query = "SELECT Brand FROM Brands";
                            $results = mysqli_query($db, $select_query);
                            $row = mysqli_num_rows($results);
                            if ($row > 0){
                                while($data = mysqli_fetch_assoc($results)){
                                    echo '<option value="' . $data['Brand'] . '">' . $data['Brand'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    <label for="">Product Series</label>
                        <select name="series" id="seriesDropdown">
                        </select>
                    <div class="product-image">
                        <label for="">Product Image 1</label><input type="file" name="imageone" value="<?php $img['ImageURL']?>">
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
                    <button class="add_button" type="submit" name="edit_products">Edit Product</button>
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