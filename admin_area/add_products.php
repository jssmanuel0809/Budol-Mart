<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Products | BUDOL</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/add_form.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
        <!-- COMPONENTS -->
        <script src="../components/admin_header.js" type="text/javascript" defer></script>
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <header-component></header-component>

        <!-- SHOP -->
        <!-- same lang class name ng section sa about, contact, index, tsaka products -->
        <section class="content">
            <h1>ADD PRODUCTS</h1>
            <div class="form_box">
                <form class="products_form" action="">
                    <label for="">Product Name</label><input type="text" id="product-input">
                    <label for="">Product Price</label><input type="text" id="product-input">
                    <label for="">Product Stocks</label><input type="text" id="product-input">
                    <label for="">Product Description</label><textarea rows="10" cols="50" id="product-desc"></textarea>
                    <label for="">Product Tags</label><input type="text" id="product-input">
                    <label for="">Product Type</label>
                        <select>
                            <option value="regular">Regular</option>
                            <option value="limited">Limited</option>
                        </select>
                    <label for="">Product Brand</label>
                        <select>
                            <option value="brand1">Brand 1</option>
                            <option value="brand2">Brand 2</option>
                            <option value="brand3">Brand 3</option>
                        </select>
                    <label for="">Product Series</label>
                        <select>
                            <option value="series1">Series 1</option>
                            <option value="series2">Series 2</option>
                            <option value="series3">Series 3</option>
                        </select>
                    <div class="product-image">
                        <label for="">Product Image 1</label><input type="file" accept="image/*">
                        <label for="">Product Image 4</label><input type="file" accept="image/*">
                        <label for="">Product Image 7</label><input type="file" accept="image/*">
                    </div>
                    <div class="product-image">
                        <label for="">Product Image 2</label><input type="file" accept="image/*">
                        <label for="">Product Image 5</label><input type="file" accept="image/*">
                        <label for="">Product Image 8</label><input type="file" accept="image/*">
                    </div>
                    <div class="product-image">
                        <label for="">Product Image 3</label><input type="file" accept="image/*">
                        <label for="">Product Image 6</label><input type="file" accept="image/*">
                        <label for="">Product Image 9</label><input type="file" accept="image/*">
                    </div>
                    <button class="add_button">Add Product</button>
                </form>
            </div>
        </section>

    </body>
</html>