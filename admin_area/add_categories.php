<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BUDOL</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/add_form.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&family=Righteous&display=swap" rel="stylesheet">
        <!-- COMPONENTS -->
        <script src="../components/admin_header.js" type="text/javascript" defer></script>
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <header-component></header-component>

        <section class="content">
            <div class="form_box">
                <form class="categories_form" action="add_categories.php" method="post" enctype="multipart/form-data">
                    <label for="">Product Brand</label>
                    <select name="brand" id="brandDropdown" onchange="toggleBrandInput()">
                        <option value="brand1">Brand 1</option>
                        <option value="brand2">Brand 2</option>
                        <option value="addBrand">Add Brand</option>
                    </select>
                    
                    <!-- Hidden input text box initially -->
                    <input type="text" name="newBrand" id="newBrandInput" placeholder="Enter New Brand" style="display: none;">
                    <label for="">Product Series</label><input type="text">
                    
                    <button class="add_button" type="submit" name="add_products">Add Product</button>
                </form>
            </div>

            <script>
                function toggleBrandInput() {
                    var brandDropdown = document.getElementById("brandDropdown");
                    var newBrandInput = document.getElementById("newBrandInput");

                    // Display input text box if "Add Brand" is selected, hide otherwise
                    newBrandInput.style.display = brandDropdown.value === "addBrand" ? "block" : "none";
                }
            </script>
        </section>


    </body>
</html>