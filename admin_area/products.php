<?php 
    //include('../includes/server.php');
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
                        // $display_query = "SELECT P.ProductID, P.ProductName, PI.ImageURL, P.Price, I.Quantity, P.ProductStatus
                        // FROM Products P
                        // INNER JOIN Inventory I ON P.ProductID = I.ProductID
                        // INNER JOIN ProductImages PI ON P.ProductID = PI.ProductID";
                        // $results = mysqli_query($db, $display_query);
                        // $row = mysqli_num_rows($results);
                        // if ($row > 0){
                        //     while($data = mysqli_fetch_assoc($results)){
                        //         echo '
                        //             <tr>
                        //                 <td>' . $data['ProductID'] . '</td>
                        //                 <td>' . $data['ProductName'] . '</td>
                        //                 <td><img src="' . $data['ImageURL'] . '"></td>
                        //                 <td>' . $data['Price'] . '</td>
                        //                 <td>' . $data['Quantity'] . '</td>
                        //                 <td>-</td>
                        //                 <td>' . $data['ProductStatus'] . '</td>
                        //                 <td>
                        //                     <a class="icon-button">
                        //                         <img src="product_images/edit.png" alt="Edit Icon" class="table-button">
                        //                     </a>
                        //                 </td>
                        //                 <td>
                        //                     <a class="icon-button" onclick="showUnlistPopup()">
                        //                         <img src="product_images/trash.png" alt="Unlist Icon" class="table-button">
                        //                     </a>
                        //                 </td>
                        //             </tr>';
                        //     }
                        // }
                    ?>


                    <tr>
                        <td>1</td>
                        <td>POPMART Lilios</td>
                        <td><img src=""></td> <!-- paayos size ng img nito para uniform lahat ng products -->
                        <td>500</td>
                        <td>100</td>
                        <td>50</td>
                        <td>true</td>
                        <td>
                            <a class="icon-button">
                                <img src="../images/edit.png" alt="Edit Icon" class="table-button">
                            </a>
                        </td>
                        <td>
                            <a class="icon-button" onclick="showUnlistPopup()">
                                <img src="../images/trash.png" alt="Unlist Icon" class="table-button">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- UNLIST WARNING -->
            <div class="overlay" id="overlay"></div>
            <div class="unlist-popup" id="unlistPopup">
                <h2>Are you sure you want to<br>unlist this product?</h2>
                <div class="popup-buttons">
                    <button class="cancel" onclick="hideUnlistPopup()">Cancel</button>
                    <button class="unlist">Unlist</button>
                </div>
            </div>
        </section>

        <script>
            function showUnlistPopup() {
                var overlay = document.getElementById("overlay");
                var unlistPopup = document.getElementById("unlistPopup");

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