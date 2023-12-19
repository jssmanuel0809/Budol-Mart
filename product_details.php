<?php 
    include('includes/server.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BUDOL | Products</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/product_details.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&family=Righteous&display=swap" rel="stylesheet">
        <!-- COMPONENTS -->
        <script src="components/header.js" type="text/javascript" defer></script>
        <script src="components/footer.js" type="text/javascript" defer></script>
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <header-component username="<?php echo $_SESSION['username']; ?>" status="<?php echo $_SESSION['status']; ?>"></header-component>

        <section id="profile" class="profile">
            <div class="product-box">
                <!-- PRODUCT DETAILS PHP CODE -->
            <?php
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
                $firstImage = mysqli_fetch_assoc($images);
                
                echo '
                    <div class="preview">
                        <img src="admin_area/' . $firstImage['ImageURL'] . '" class="spotlight" id="spotlight">
                        <div class="image_slider" id="imageSlider" onclick="changeSpotlight(event)">
                        <img src="admin_area/' . $firstImage['ImageURL'] . '" class="product_images">
                    ';

                    while ($img = mysqli_fetch_assoc($images)) {
                        echo '<img src="admin_area/' . $img['ImageURL'] . '" class="product_images">';
                    }

                    echo '
                        </div>
                    </div>

                    <form method="post" action="includes/add_cart.php">
                        <div class="text_content">
                            <input type="text" name="prodid" value="' . $data['ProductID'] . '" readonly hidden>
                            <input type="text" name="prodname" value="' . $data['ProductName'] . '" readonly hidden>
                            <h2>' . $data['ProductName'] . '</h2>
                            <h4>' . $data['Series'] . '</h4>
                            <h5>' . $data['Brand'] . '</h5>
                            <h3>PHP ' . $data['Price'] . '</h3>
                            <input type="hidden" name="product_quantity" id="product_quantity" value="1">
                            <div class="add-cart">
                                <div class="quantity">
                                    <span class="minus" onclick="decrement()">-</span>
                                    <span class="num" id="quantity">01</span>
                                    <span class="add" onclick="increment()">+</span>
                                </div>
                                <div class="cart_button">
                                    <button class="add_button" type="submit" name="get_cart">Add to Cart</button>
                                </div>
                            </div>
                            <h4>DETAILS</h4>
                            <h6>' . $data['ProductDescription'] . '</h6>
                        </div>
                    </form>
                    ';
            }
            ?>
            </div>
        </section>

        <script>
            var quantityElement = document.getElementById('quantity');
            var currentQuantity = 1;

            function decrement() {
                var quantityElement = document.getElementById('quantity');
                var hiddenInput = document.getElementById('product_quantity');

                var quantityValue = parseInt(quantityElement.innerText, 10);
                if (quantityValue > 1) {
                    quantityValue--;
                    quantityElement.innerText = quantityValue;
                    hiddenInput.value = quantityValue;
                }
            }

            function increment() {
                var quantityElement = document.getElementById('quantity');
                var hiddenInput = document.getElementById('product_quantity');

                var quantityValue = parseInt(quantityElement.innerText, 10);
                quantityValue++;
                quantityElement.innerText = quantityValue;
                hiddenInput.value = quantityValue;
            }

            function changeSpotlight(event) {
                if (event.target.tagName === 'IMG') {
                    var images = document.querySelectorAll('.product_images');
                    images.forEach(image => image.classList.remove('selected'));
                    event.target.classList.add('selected');

                    var spotlightImage = document.getElementById('spotlight');
                    spotlightImage.src = event.target.src;
                }
            }
        </script>

    </body>
</html>