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
        <header-component></header-component>

        <!-- same lang class name ng section sa about, contact, index, tsaka products -->
        <!-- PRODUCTS -->
        <section id="profile" class="profile">
            <div class="product-box">
            <div class="text_content">
                    <h1>Order Summary</h1>
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
                        <tr>
                            <td>
                                <img src="images/placeholder.png" alt="Product Icon" class="product-img">
                            </td>
                            <td>Product Name</td>
                            <td>P200</td>
                            <td>
                                <div class="quantity">
                                    <span class="minus" onclick="decrement()">-</span>
                                    <span class="num" id="quantity">01</span>
                                    <span class="add" onclick="increment()">+</span>
                                </div>
                            </td>
                            <td>
                                <a class="icon-button" onclick="removeProduct(this)">
                                    <img src="images/trash.png" alt="Remove Icon" class="table-button">
                                </a>
                            </td>
                        </tr>
                    </table>
                    <div class="total_summary">
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td>P200</td>
                            </tr>
                        </table>
                    </div>
                    <div class="cart_button">
                            <button class="add_button" type="submit" name="add_cart">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </section>

        <script>
            // JavaScript to handle quantity increment and decrement
            var quantityElement = document.getElementById('quantity');
            var currentQuantity = 1; // Initial quantity

            function increment() {
                currentQuantity++;
                updateQuantity();
            }

            function decrement() {
                if (currentQuantity > 1) {
                    currentQuantity--;
                    updateQuantity();
                }
            }

            function updateQuantity() {
                quantityElement.textContent = currentQuantity.toString().padStart(2, '0');
            }

            function removeProduct(element) {
                var row = element.closest('tr');
                row.remove();
            }

        </script>

        <!-- FOOTER -->
        <!-- <footer-component></footer-component> -->
    </body>
</html>