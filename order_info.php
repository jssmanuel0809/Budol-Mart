<?php 
    include('includes/server.php');
    include('includes/protect.php');
    $user = $_SESSION['username'];
    $select_query = "SELECT * FROM Customers
    WHERE AccountName = '$user'";
    $results = mysqli_query($db, $select_query);
    $data = mysqli_fetch_assoc($results);
    $customerid = $data['CustomerID'];

    $select_profile = "SELECT * FROM CustomerProfiles
    WHERE CustomerID = '$customerid'";
    $profile = mysqli_query($db, $select_profile);
    $info = mysqli_fetch_assoc($profile);

    $shipping = 200;
    $total = 0;

    if (isset($_POST['order_info'])){
        $orderid = $_POST['orderid'];

        $select_order = "SELECT * FROM Orders
        WHERE OrderID = '$orderid'";
        $fetch_order = mysqli_query($db, $select_order);
        $order = mysqli_fetch_assoc($fetch_order);

        $select_details = "SELECT * FROM OrderDetails
        WHERE OrderID = '$orderid'";
        $fetch_detail = mysqli_query($db, $select_details);
    }
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
        <link rel="stylesheet" href="style/order_summary.css">
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
                <div class="text_content">
                        <input type="hidden" name="customer_id" value="<?php echo $customerid; ?>">
                        <h1>Order # <?php echo $orderid . ': ' . $order['OrderStatus']?> </h1>
                        <table class="order-table">
                            <!-- HEADER  -->
                            <tr class="table-header">
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                            <!-- TABLE -->
                            <?php
                                $row = mysqli_num_rows($fetch_detail);
                                if ($row > 0){
                                    while($detail = mysqli_fetch_assoc($fetch_detail)){
                                        $prodid = $detail['ProductID'];
                                        $qty = $detail['Quantity'];
                                        $product_query = "SELECT PI.ImageURL, P.ProductName
                                        FROM Products P
                                        INNER JOIN ProductImages PI ON PI.ProductID = P.ProductID
                                        WHERE P.ProductID = '$prodid'";
                                        $prod_info = mysqli_query($db, $product_query);
                                        $order_info = mysqli_fetch_assoc($prod_info);
                                        echo '
                                            <tr class="product-contents">
                                                <td>
                                                    <img src="admin_area/'.$order_info['ImageURL'].'" alt="Product Icon" class="product-img">
                                                </td>
                                                <td>'.$order_info['ProductName'].'</td>
                                                <td>'.$qty.'</td>
                                                <td id="price-' . $prodid . '">P ' . $detail['ProductPrice'] . '</td>
                                            </tr>
                                        ';
                                        $total += $detail['ProductPrice'];

                                    }
                                }
                            ?>
                            </table>
                            <div class="total_summary">
                                <table>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>P <?php echo $total?></td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>P <?php echo $shipping?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="overall_total">
                                <table>
                                    <tr>
                                        <?php $amount = $order['TotalPrice'];?>
                                        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                        <td>Total</td>
                                        <td class="price">P <?php echo $amount?></td>
                                    </tr>
                                </table>
                            </div>
                </div>
            </div>

            <div class="product-box">
                <div class="text_content">
                    <h1>Customer Information</h1>
                    <table class="customer_info">
                        <!-- TABLE -->
                        <tr>
                            <th>SHIPPING ADDRESS</th>
                            <th>BILLING ADDRESS</th>
                        </tr>
                        <tr>
                            <td>Name: <?php echo $info['CustomerName']?></td>
                            <td>Name: <?php echo $info['CustomerName']?></td>
                        </tr>
                        <tr>
                            <td>Home Address:  <?php echo $info['HomeAddress']?></td>
                            <td>Home Address:  <?php echo $info['HomeAddress']?></td>
                        </tr>
                        <tr>
                            <td>Brgy. <?php echo $info['Barangay'] . ' ' . $info['City'] . ', ' . $info['Province']?></td>
                            <td>Brgy. <?php echo $info['Barangay'] . ' ' . $info['City'] . ', ' . $info['Province']?></td>
                        </tr>
                        <tr>
                            <td>Contact #: <?php echo $info['PhoneNumber']?></td>
                            <td>Contact #: <?php echo $info['PhoneNumber']?> </td>
                        </tr>
                        <tr>
                            <td>Shipping Method: LBC</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </body>
</html>