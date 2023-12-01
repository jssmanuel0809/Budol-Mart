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
        <link href="https://fonts.googleapis.com/css2?family=Amarante&family=Darker+Grotesque:wght@400;600;700;900&display=swap" rel="stylesheet">
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
                    <label for="">Product Name</label><input type="text">
                    <label for="">Product Description</label><input type="text">
                    <label for="">Product Tags</label><input type="text">
                    <label for="">Product Category</label><input type="text">
                    <label for="">Product Brand</label><input type="text">
                    <label for="">Product Price</label><input type="text">
                    <label for="">Product Image 1</label><input type="text">
                    <label for="">Product Image 2</label><input type="text">
                    <label for="">Product Image 3</label><input type="text">
                    <button class="add_button">Add Product</button>
                </form>
            </div>
        </section>

    </body>
</html>