<?php 
    include('includes/server.php');
    // $total = 0;
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
        <title>BUDOL | Products</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/cart.css">
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
        <section id="profile" class="profile">
            <div class="product-box">
                <div class="text_content">
                    <form action="order_summary.php" method="post">
                        <input type="hidden" name="selected_products" id="totalInput" value="">
                        <input type="hidden" name="total" value="">
                        <input type="hidden" name="product_ids" id="productIdsInput" value="">
                        <h1>Shopping Cart</h1>
                            <table class="order-table">
                                <!-- HEADER  -->
                                <tr class="table-header">
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Unlist</th>
                                </tr>
                                    <!-- LAMAN NG TABLE -->
                                    <?php
                                        $display_query = "SELECT * FROM ShoppingCart
                                        WHERE CustomerID = '$customerid'";
                                        $results = mysqli_query($db, $display_query);
                                        $row = mysqli_num_rows($results);
                                        if ($row > 0){
                                            $rowIndex = 1;
                                            while($data = mysqli_fetch_assoc($results)){
                                                $prodid = $data['ProductID'];
                                                $qty = $data['Quantity'];
                                                $product_query = "SELECT PI.ImageURL, P.ProductName, (P.Price * SC.Quantity) AS 'TOTAL'
                                                FROM Products P
                                                INNER JOIN ProductImages PI ON PI.ProductID = P.ProductID
                                                INNER JOIN ShoppingCart SC ON P.ProductID = SC.ProductID
                                                WHERE P.ProductID = '$prodid' AND SC.CustomerID = '$customerid'";
                                                $info = mysqli_query($db, $product_query);
                                                $cart_info = mysqli_fetch_assoc($info);
                                                echo '
                                                <tr id="order-row-' . $rowIndex . '">
                                                    <td>
                                                        <input type="checkbox" name="selected_products[]" value="' . $prodid . '" onchange="updateSelectedProducts(this)">
                                                    </td>
                                                    <td>
                                                        <img src="admin_area/'.$cart_info['ImageURL'].'" alt="Product Icon" class="product-img">
                                                    </td>
                                                    <td>'.$cart_info['ProductName'].'</td>
                                                    <td id="price-' . $prodid . '">P ' . $cart_info['TOTAL'] . '</td>
                                                    <td>
                                                        <div class="quantity">
                                                            <span class="minus" onclick="decrement(' . $prodid . ')">-</span>
                                                            <span class="num" id="quantity-' . $prodid . '">'.$qty.'</span>
                                                            <span class="add" onclick="increment(' . $prodid . ')">+</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a class="icon-button" onclick="removeProduct(' . $rowIndex . ', ' . $prodid . ' , reloadPage)">
                                                            <img src="images/trash.png" alt="Remove Icon" class="table-button">
                                                        </a>
                                                    </td>
                                                </tr>
                                                ';
                                                $rowIndex++;
                                            }
                                        }
                                    ?>
                            </table>
                            <div class="total_summary">
                                <table>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td id="totalPrice">P</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="cart_button">
                                <button class="add_button" type="submit" name="get_order">Proceed to Checkout</button>
                            </div>
                    </form>
                </div>
            </div>
        </section>

        <script>
            var selectedProducts = [];

            function updateSelectedProducts(checkbox) {
                var productId = checkbox.value;

                if (checkbox.checked) {
                    // Add the product to the array if checked
                    selectedProducts.push(productId);
                } else {
                    // Remove the product from the array if unchecked
                    var index = selectedProducts.indexOf(productId);
                    if (index !== -1) {
                        selectedProducts.splice(index, 1);
                    }
                }

                // Update the hidden input value with the selected products array
                document.getElementById('totalInput').value = selectedProducts.join(',');

                // Calculate and update the total price display
                calculateTotalPrice();
            }

            function calculateTotalPrice() {
                var total = 0;

                // Iterate over selected products and sum their prices
                selectedProducts.forEach(function(productId) {
                    var productPrice = parseFloat(document.getElementById('price-' + productId).textContent.replace('P', ''));
                    total += productPrice;
                });

                // Update the total price display
                document.getElementById('totalPrice').textContent = 'P' + total.toFixed(2);
            }

            // Initialize currentQuantity with the value from the server
            var currentQuantity = <?php echo $qty; ?>;
            var product_id = <?php echo $prodid; ?>; // Assuming $prodid is the product ID

            function updateQuantity(new_quantity, product_id, callback) {
                // Send an AJAX request to update_quantity.php
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'includes/update_cart.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle the response if needed
                        console.log(xhr.responseText);
                        // Execute the callback function
                        if (typeof callback === 'function') {
                            callback();
                        }
                    }
                };
                xhr.send('product_id=' + encodeURIComponent(product_id) + '&quantity=' + encodeURIComponent(new_quantity));
            }

            function increment(product_id) {
                currentQuantity = parseInt(document.getElementById('quantity-' + product_id).textContent);
                currentQuantity++;
                updateQuantity(currentQuantity, product_id, reloadPage);
                updateQuantityUI(product_id, currentQuantity);
            }

            function decrement(product_id) {
                currentQuantity = parseInt(document.getElementById('quantity-' + product_id).textContent);
                if (currentQuantity > 1) {
                    currentQuantity--;
                    updateQuantity(currentQuantity, product_id, reloadPage);
                    updateQuantityUI(product_id, currentQuantity);
                }
            }

            function updateQuantityUI(product_id, new_quantity) {
                document.getElementById('quantity-' + product_id).textContent = new_quantity.toString().padStart(2, '0');
            }

            function removeProduct(row, product_id, callback) {
                // Send an AJAX request to remove_product.php
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'includes/remove_cart.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle the response if needed
                        console.log(xhr.responseText);
                        // Execute the callback function
                        if (typeof callback === 'function') {
                            callback();
                        }
                    }
                };
                xhr.send('product_id=' + encodeURIComponent(product_id));
            }

            function reloadPage() {
                // Reload the page
                location.reload();
            }

        </script>

        <!-- FOOTER -->
        <!-- <footer-component></footer-component> -->
    </body>
</html>