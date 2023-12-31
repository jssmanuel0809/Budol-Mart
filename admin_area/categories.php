<?php
include('../includes/server.php');
include('../includes/admin_protections.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BUDOL</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/admin_categories.css">
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
                        <th>Brand</th>
                        <th>Series</th>
                    </tr>
                    <!-- TABLE -->
                    <?php 
                        $display_query = "SELECT *
                        FROM Brands
                        ORDER BY BrandID";
                        $results = mysqli_query($db, $display_query);
                        $row = mysqli_num_rows($results);
                        if ($row > 0){
                            while($data = mysqli_fetch_assoc($results)){
                                $brnd = $data['BrandID'];
                                $series_query = "SELECT S.Series
                                FROM Brands B
                                INNER JOIN Series S ON B.BrandID = S.BrandID
                                WHERE B.BrandID = '$brnd'";
                                $srsres = mysqli_query($db, $series_query);
                                $srs = mysqli_num_rows($srsres);
                                if ($srs > 0){
                                    while($series = mysqli_fetch_assoc($srsres)){
                                        echo '
                                        <tr>
                                            <td>' . $data['Brand'] . '</td>
                                            <td>' . $series['Series'] . '</td>
                                        </tr>
                                        ';
                                    }
                                }
                                else {
                                    echo '
                                        <tr>
                                            <td>' . $data['Brand'] . '</td>
                                            <td></td>
                                        </tr>
                                        ';
                                }
                                
                            }
                        }
                    ?>
                </table>
            </div>
        </section>
    </body>
</html>