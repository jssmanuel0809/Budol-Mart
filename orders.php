<?php 
    include('includes/server.php');
    include('includes/protect.php');
    $user = $_SESSION['username'];
    $select_query = "SELECT * FROM Customers
    WHERE AccountName = '$user'";
    $results = mysqli_query($db, $select_query);
    $data = mysqli_fetch_assoc($results);
    $customerid = $data['CustomerID'];
?>
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
    <!-- COMPONENTS -->
    <script src="components/header.js" type="text/javascript" defer></script>
    <script src="components/filter.js" type="text/javascript" defer></script>
</head>

<body>

    <header-component username="<?php echo $_SESSION['username']; ?>" status="<?php echo $_SESSION['status']; ?>"></header-component>

    <section id="order" class="order">
        <div class="order-box">
            <h1>Orders</h1>
        </div>
    </section>

    <div class="order-box-contents">
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Date of Order</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Estimated Time of Arrival</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $select_order = "SELECT * FROM Orders
                    WHERE CustomerID = '$customerid'";
                    $order_results = mysqli_query($db, $select_order);
                    $row = mysqli_num_rows($order_results);
                    if ($row > 0){
                        while($order_info = mysqli_fetch_assoc($order_results)){
                            $id = $order_info['OrderID'];
                            $date = $order_info['OrderDate'];
                            $price = $order_info['TotalPrice'];
                            $status = $order_info['OrderStatus'];
                            $eta = $order_info['ETA'];
                            echo '
                            <tr>
                                <form action="order_info.php" method="post">
                                    <input type="hidden" name="orderid" value="' . $id . '">
                                    <td><button type="submit" name="order_info" href="order_info.php"># '. $id .'</a></td>
                                </form>
                                <td>'. $date .'</td>
                                <td>PHP '. $price .'</td>
                                <td>'. $status .'</td>
                                <td>'. $eta .'</td>
                            </tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>