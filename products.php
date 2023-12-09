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
        <link rel="stylesheet" href="style/products.css">
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

        <!-- PRODUCTS -->
        <!-- same lang class name ng section sa about, contact, index, tsaka products -->
        <!-- SELLER HOME PAGE -->
        <section id="profile" class="profile">
            <div class="browse-box">
                <div class="filter-section">
                    <a href="#" class="icon-button">
                        <img src="images/menu.png" alt="Filter Icon" class="menu-filter">
                    </a>
                    <div class="text-box">
                        <div class="filter-box">
                            <h2>Filter</h2>
                        </div>
                        <div class="sort-box">
                            <p>Sort by: alphabetically, A-Z</p>
                        </div>
                    </div>
                </div>
                <div class="browsing-items">
                    <!-- PHP FUNCTION FOR DISPLAY (uncomment pag connected na sa server)-->
                    <?php
                        $display_query = "SELECT P.ProductID, P.ProductName, P.Price, I.Quantity, P.ProductStatus
                        FROM Products P
                        INNER JOIN Inventory I ON P.ProductID = I.ProductID";
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
                                <form action="product_details.php" method="post">
                                    <div class="listing">
                                        <img src="admin_area/' . $img['ImageURL'] . '" class="productimg">
                                        <input type="text" name="prodid" value="' . $data['ProductID'] . '" readonly hidden>
                                        <input type="text" name="prodname" value="' . $data['ProductName'] . '" readonly>
                                        <input type="text" name="price" value="' . $data['Price'] . '" readonly>
                                        <button type="submit" value="Submit" name="get_prod" href="product_details.php" class="details-button">MORE DETAILS</button>
                                    </div>
                                </form>
                                ';
                            }
                        }
                    ?>
                </div>
                <div class="pagination">
                    <ul class="page-numbers">
                    <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">...</a></li>
                      <img src="images/next.png" alt="Next Icon" class="page">
                      <img src="images/lastpage.png" alt="Last Page Icon" class="page">
                    </ul>
                </div>
            </div>
        </section>
        <section class="content">
            
        </section>

        <!-- FOOTER -->
        <!-- <footer-component></footer-component> -->
    </body>
</html>