<?php
include('../includes/server.php');
include('../includes/admin_protections.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Products | BUDOL Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/view_products.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&family=Righteous&display=swap" rel="stylesheet">
        <!-- COMPONENTS -->
        <script src="../components/admin_header.js" type="text/javascript" defer></script>
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <header-component></header-component>

        <!-- SHOP -->
        <!-- same lang class name ng section sa about, contact, index, tsaka products -->
        <section class="content">
            <div class="admin-buttons">
                <a href="add_products.php"><button>Add Products</button></a>
                <a href="products.php"><button>View Products</button></a>
                <a href="add_categories.php"><button>Add Categories</button></a>
                <a href="categories.php"><button>View Categories</button></a>
            </div>
            <h1>All Products</h1>
            
            <!-- PRODUCTS DISPLAY -->
            <div class="product-table">
                <table class="order-table">
                    <!-- HEADER  -->
                    <tr class="table-header">
                        <th>Product ID</th>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Sold</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Unlist</th>
                    </tr>
                    <!-- LAMAN NG TABLE -->

                    <!-- PHP FUNCTION FOR DISPLAY (uncomment pag connected na sa server)-->
                    <?php
                        $display_query = "SELECT P.ProductID, P.ProductName, P.Price, I.Quantity, P.ProductStatus
                        FROM Products P
                        INNER JOIN Inventory I ON P.ProductID = I.ProductID
                        WHERE P.ProductStatus = 'Active'";
                        $results = mysqli_query($db, $display_query);
                        $row = mysqli_num_rows($results);
                        if ($row > 0){
                            while($data = mysqli_fetch_assoc($results)){
                                $prodid = $data['ProductID'];
                                $product_images_query = "SELECT PI.ImageURL
                                FROM ProductImages PI
                                INNER JOIN Products P ON PI.ProductID = P.ProductID
                                WHERE P.ProductID = '$prodid'";
                                $images = mysqli_query($db, $product_images_query);
                                $img = mysqli_fetch_assoc($images);
                                echo '
                                    <tr>
                                        <form method="post" action="edit_products.php">
                                            <td><input type="text" name="prodid" value="' . $data['ProductID'] . '" readonly></td>
                                            <td><input type="text" name="prodname" value="' . $data['ProductName'] . '" readonly></td>
                                            <td><img class="prodimg" src="' . $img['ImageURL'] . '"></td>
                                            <td>' . $data['Price'] . '</td>
                                            <td>' . $data['Quantity'] . '</td>
                                            <td>-</td>
                                            <td>' . $data['ProductStatus'] . '</td>
                                            <td>
                                                <button class="icon-button" type="submit" value="Submit" name="get_prod" href="edit_products.php">
                                                    <img src="../images/edit.png" alt="Edit Icon" class="table-button">
                                                </button>
                                            </td>
                                            <td>
                                                <button class="icon-button" type="button" value="Submit" name="unlist_product" class="details-button" onclick="showUnlistPopup('. $prodid . ')">
                                                    <img src="../images/trash.png" alt="Unlist Icon" class="table-button">
                                                </button>
                                            </td>
                                        </form>
                                    </tr>';

                                    
                            }
                        }
                    ?>
                </table>
            </div>

            <!-- UNLIST WARNING -->
            <div class="overlay" id="overlay"></div>
            <div class="unlist-popup" id="unlistPopup">
                <h2>Are you sure you want to<br>unlist this product?</h2>
                <form id="unlistForm" action="../includes/unlist_product.php" method="post">
                    <div class="popup-buttons">
                        <button class="cancel" onclick="hideUnlistPopup()">Cancel</button>
                        <button class="unlist" type="submit" name="unlist_product">Unlist</button>
                    </div>
                </form>
            </div>
        </section>

        <script>
            function showUnlistPopup(productID) {
                var overlay = document.getElementById("overlay");
                var unlistPopup = document.getElementById("unlistPopup");
        
                // Set the product ID in the form action
                var form = document.getElementById("unlistForm");
                form.action = "../includes/unlist_product.php?prodid=" + productID;
        
                overlay.style.display = "block";
                unlistPopup.classList.add("active");
            }

            function hideUnlistPopup() {
                var overlay = document.getElementById("overlay");
                var unlistPopup = document.getElementById("unlistPopup");

                overlay.style.display = "none";
                unlistPopup.classList.remove("active");
            }
        </script>

    </body>
</html>