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

    if (isset($_POST['get_order'])){
        $selectedProducts = $_POST['selected_products'] ?? [];
        $productIds = $_POST['product_ids'] ?? [];

        if (!empty($selectedProducts)) {
            $query = "SELECT * FROM ShoppingCart
            WHERE ProductID IN (" . implode(',', $selectedProducts) . ")
            AND CustomerID = '$customerid'";
            $result = mysqli_query($db, $query);
        }
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
        <link rel="stylesheet" href="style/order-summary.css">
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
                    <form action="includes/create_order.php" method="post">
                        <input type="hidden" name="customer_id" value="<?php echo $customerid; ?>">
                        <h1>Order Summary</h1>
                        <table class="order-table">
                            <!-- HEADER  -->
                            <tr class="table-header">
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                            <!-- TABLE -->
                            <?php
                                $row = mysqli_num_rows($result);
                                if ($row > 0){
                                    while($data = mysqli_fetch_assoc($result)){
                                        $prodid = $data['ProductID'];
                                        $qty = $data['Quantity'];
                                        $product_query = "SELECT PI.ImageURL, P.ProductName, (P.Price * SC.Quantity) AS 'TOTAL'
                                        FROM Products P
                                        INNER JOIN ProductImages PI ON PI.ProductID = P.ProductID
                                        INNER JOIN ShoppingCart SC ON P.ProductID = SC.ProductID
                                        WHERE P.ProductID = '$prodid' AND SC.CustomerID = '$customerid'";
                                        $prod_info = mysqli_query($db, $product_query);
                                        $cart_info = mysqli_fetch_assoc($prod_info);
                                        echo '
                                            <input type="hidden" name="product_ids[]" value="' . $prodid . '">
                                            <input type="hidden" name="quantities[]" value="' . $qty . '">
                                            <tr class="product-contents">
                                                <td>
                                                    <img src="admin_area/'.$cart_info['ImageURL'].'" alt="Product Icon" class="product-img">
                                                </td>
                                                <td>'.$cart_info['ProductName'].'</td>
                                                <td>'.$qty.'</td>
                                                <td id="price-' . $prodid . '">P ' . $cart_info['TOTAL'] . '</td>
                                            </tr>
                                        ';
                                        $total += $cart_info['TOTAL'];

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
                                <div class="upper">
                                    <table>
                                        <tr>
                                            <?php $amount = $total + $shipping;?>
                                            <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                            <td>Total</td>
                                            <td class="price">P <?php echo $amount?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="lower">
                                    <button class="add_button" type="submit" name="create_order">Order</button>
                            </div>
                        </form>
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