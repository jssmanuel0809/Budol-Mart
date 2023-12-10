<?php 
    include('server.php');
    if (isset($_POST['create_order'])){
        $customer_id = $_POST['customer_id'];
        $product_ids = $_POST['product_ids'];
        $quantities = $_POST['quantities'];
        $amount = $_POST['amount'];
        $items = count($product_ids);
        $date = new DateTime(date('m.d.y'));
        $dateOrd = $date->format('Y-m-d H:i');
        $dateSevenDaysLater = $date->modify('+7 days');
        $eta = $dateSevenDaysLater->format('Y-m-d');
        $status = mysqli_real_escape_string($db, "Preparing Order");

        if (!empty($product_ids)) {
            $insert_query = "INSERT INTO Orders (CustomerID, ItemsAmount, TotalPrice, OrderDate, ETA, OrderStatus)
            VALUES ('$customer_id', '$items', '$amount', '$dateOrd', '$eta', '$status')";
            $working = mysqli_query($db, $insert_query);

            if ($working){
                print_r("working");
                echo '<br>';
                $orderid = mysqli_insert_id($db);
                print_r($orderid);
                echo '<br>';

                $query = "SELECT SC.ProductID, SC.Quantity, (SC.Quantity * P.Price) AS 'Price'
                FROM ShoppingCart SC
                INNER JOIN Products P ON SC.ProductID = P.ProductID
                WHERE SC.ProductID IN (" . implode(',', $product_ids) . ")
                AND SC.CustomerID = '$customer_id'";
                $result = mysqli_query($db, $query);
                print_r($query);
                echo '<br>';
                $row = mysqli_num_rows($result);
                if ($row > 0){
                    while($data = mysqli_fetch_assoc($result)){
                        print_r("working");
                        $prodid = $data['ProductID'];
                        $qty = $data['Quantity'];
                        $totprice = $data['Price'];
                        echo '<br>';
                        print_r($prodid);
                        echo '<br>';
                        print_r($qty);
                        echo '<br>';
                        print_r($totprice);

                        $insert_details = "INSERT INTO OrderDetails (OrderID, ProductID, Quantity, ProductPrice)
                        VALUES ('$orderid', '$prodid', '$qty', '$totprice')";
                        mysqli_query($db, $insert_details);
                        print_r($insert_details);
                        echo '<br>';

                        $delete_query = "DELETE FROM ShoppingCart
                        WHERE ProductID = '$prodid' AND CustomerID = '$customer_id'";
                        mysqli_query($db, $delete_query);
                        print_r($delete_query);

                        header('location: ../orders.php');
                    }
                }
            }
        }
    }
?>