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
        <link rel="stylesheet" href="../style/admin_products.css">
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
                <a href="add_products.php"><button>View Products</button></a>
                <a href="add_products.php"><button>Add Categories</button></a>
                <a href="add_products.php"><button>View Categories</button></a>
            </div>
            <h1>All Products</h1>
            
            <!-- PRODUCTS DISPLAY -->
            <div class="product-table">
                <table class="order-table">
                    <tr>
                        <th>Order 1</th>
                        <th>Order 2</th>
                        <th>Order 3</th>
                        <th>Order 4</th>
                        <th>Order 5</th>
                        <th>Order 6</th>
                        <th>Order 7</th>
                        <th>Order 8</th>
                    </tr>
                    <!-- Add your product rows here -->
                </table>
            </div>
        </section>

    </body>
</html>