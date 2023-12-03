<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BUDOL Orders Buyer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/orders.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">

        <script src="components/header.js" type="text/javascript" defer></script>
    </head>

    <body> 
        <header-component></header-component>

        <section id="order" class="order">
            <div class="order-box">
                <h1>Orders</h1>
                <div class="filters">
                    <form id="search" method="post" action="search.php">
                        <input type="text" name="searching" placeholder="SEARCH">
                    </form>
                    <a href="" class="button">Filter:</a>
                </div>
            </div>
        </section>

        <div class="order-box-contents">
            <div class="column">
                <p>Order #</p>
            </div>
            <div class="column">
                <p>Date of Order</p>
            </div>
            <div class="column">
                <p>Total</p>
            </div>
            <div class="column">
                <p>Status</p>
            </div>
            <div class="column">
                <p>Estimated Time of Arrival</p>
            </div>
        </div>
    </body>
</html>