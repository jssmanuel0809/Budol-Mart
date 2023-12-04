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
        <link rel="stylesheet" href="style/product_details.css">
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
                <div class="preview">
                    <img src="images/placeholder.png" class="placeholder">
                </div>
                <div class="text_content">
                    <h2>Product Name</h2>
                    <h4>SERIES</h4>
                    <h5>BRAND</h5>
                    <h3>PHP 100.00</h3>
                    <div class="add-cart">
                    <div class="quantity">
                        <span class="minus" onclick="decrement()">-</span>
                        <span class="num" id="quantity">01</span>
                        <span class="add" onclick="increment()">+</span>
                    </div>
                        <div class="cart_button">
                        <button class="add_button" type="submit" name="add_cart">Add to Cart</button>
                        </div>
                    </div>
                    <h4>DETAILS</h4>
                    <h6>I can't lie, it feels nice that you're calling<br>
                    You sound sad and alone, and you're stalling<br>
                    And for once, I don't care about what you want<br>
                    As long as we keep talking (as long as we're talking)<br>
                    I mean, you gotta admit the history's kind of unmatched<br>
                    Asian Calvinism, we made it out of that<br>
                    Well, whether we're free of will or predestined<br>
                    Clearly, I've not learned my lesson even now<br>
                    Hope He doesn't strike me down (strike me down)<br>
                    The Goo Goo Dolls are dead to me<br>
                    The way you should be too but you bring them up<br>
                    Along with how much I fucking miss you</h6>
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
        </script>

        <!-- FOOTER -->
        <!-- <footer-component></footer-component> -->
    </body>
</html>