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
                        </tr>
                        <!-- LAMAN NG TABLE -->
                        <tr>
                            <td>
                                <img src="images/placeholder.png" alt="Product Icon" class="product-img">
                            </td>
                            <td>Product Name</td>
                            <td>P200</td>
                        </tr>
                    </table>
                    <div class="total_summary">
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td>P200</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>P200</td>
                            </tr>
                        </table>
                    </div>
                    <div class="overall_total">
                        <table>
                            <tr>
                                <td>Total</td>
                                <td class="price">P200</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="product-box">
                <div class="text_content">
                    <h1>Customer Information</h1>
                    <table class="customer_info">
                        <!-- LAMAN NG TABLE -->
                        <tr>
                            <th>SHIPPING ADDRESS</th>
                            <th>BILLING ADDRESS</th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>Name</td>
                        </tr>
                        <tr>
                            <td>Address Line 1</td>
                            <td>Address Line 1</td>
                        </tr>
                        <tr>
                            <td>Address Line 2</td>
                            <td>Address Line 2</td>
                        </tr>
                        <tr>
                            <td>Contact #</td>
                            <td>Contact #</td>
                        </tr>
                        <tr>
                            <td>Shipping Method</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <!-- <footer-component></footer-component> -->
    </body>
</html>