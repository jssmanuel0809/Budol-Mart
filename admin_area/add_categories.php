<?php
    include('../includes/server.php');
    include('../includes/admin_protections.php');

    //ADD CATEGORIES FUNCTION
    if (isset($_POST['add_categories'])){
        //BRAND VALIDATION
        $brandselection = $_POST['brand'];
        if($brandselection == "addBrand"){
            $brand = mysqli_real_escape_string($db, $_POST['newBrand']);
            $brands_check_query = "SELECT * FROM Brands
            WHERE Brand = '$brand'";
            $results = mysqli_query($db, $brands_check_query);
            $brnd = mysqli_fetch_assoc($results);
            if ($brnd){
                array_push($errors, "Duplicate brand detected.");
            }

            //INSERTION
            if(count($errors) == 0){
                $insert_query = "INSERT INTO Brands (Brand)
                VALUES ('$brand')";
                mysqli_query($db, $insert_query);

                //SERIES VALIDATION
                if(isset($_POST['series'])){
                    $series = mysqli_real_escape_string($db, $_POST['series']);
                    $brands_check_query = "SELECT * FROM Brands
                    WHERE Brand = '$brand'";
                    $results = mysqli_query($db, $brands_check_query);
                    $brnd = mysqli_fetch_assoc($results);
                    $brndID = $brnd['BrandID'];
                    //INSERTION
                    $insert_query = "INSERT INTO Series (BrandID, Series)
                    VALUES ('$brndID', '$series')";
                    mysqli_query($db, $insert_query);
                }
            }
        }else{
            $brand = mysqli_real_escape_string($db, $_POST['brand']);
            //SERIES VALIDATION
            if(isset($_POST['series'])){
                $series = mysqli_real_escape_string($db, $_POST['series']);
                
                $series_check_query = "SELECT * FROM Series S
                INNER JOIN Brands B ON S.BrandID = B.BrandID
                WHERE S.Series = '$series' AND B.Brand = '$brand'";
                $results = mysqli_query($db, $series_check_query);
                $srs = mysqli_fetch_assoc($results);
                if ($srs){
                    array_push($errors, "Duplicate series detected.");
                }

                

                //INSERTION
                if(count($errors) == 0){
                    $series_check_query = "SELECT * FROM Brands
                    WHERE Brand = '$brand'";
                    $results = mysqli_query($db, $series_check_query);
                    $srs = mysqli_fetch_assoc($results);
                    $brndID = $srs['BrandID'];
                    $insert_query = "INSERT INTO Series (BrandID, Series)
                    VALUES ('$brndID', '$series')";
                    mysqli_query($db, $insert_query);
                }
            }
        }

        header('location: categories.php');
    }
?>
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
                <form class="categories_form" action="add_categories.php" method="post">
                    <?php include('../includes/errors.php') ?>
                    <label for="">Product Brand</label>
                    <select name="brand" id="brandDropdown" onchange="toggleBrandInput()">
                        <option value="select">Select Brand</option>
                        <?php
                            $select_query = "SELECT Brand FROM Brands";
                            $results = mysqli_query($db, $select_query);
                            $row = mysqli_num_rows($results);
                            if ($row > 0){
                                while($data = mysqli_fetch_assoc($results)){
                                    echo '<option value="' . $data['Brand'] . '">' . $data['Brand'] . '</option>';
                                }
                            }
                        ?>
                        <option value="addBrand">Add Brand</option>
                    </select>
                    
                    <!-- Hidden input text box initially -->
                    <input type="text" name="newBrand" id="newBrandInput" placeholder="Add New Brand" style="display: none;">                    
                    <div id="series">
                        <label for="">Product Series</label><input type="text" name="series" id="seriesInput" placeholder="Add New Series">
                    </div>
                    
                    <button class="add_button" type="submit" name="add_categories">Add Category</button>
                </form>
            </div>

            <script>
                newBrandInput.style.display = "hidden";
                newBrandInput.disabled = true;
                seriesInput.disabled = true;
                series.style.visibility = "hidden";

                function toggleBrandInput() {
                    var brandDropdown = document.getElementById("brandDropdown");
                    var brandselection = brandDropdown.value;
                    var newBrandInput = document.getElementById("newBrandInput");
                    var seriesInput = document.getElementById("seriesInput");
                    var series = document.getElementById("series");

                    if (brandselection == "addBrand") {
                        // Display input text box if "Add Brand" is selected, hide otherwise
                        newBrandInput.style.display = "block";
                        newBrandInput.disabled = false;
                        seriesInput.disabled = true;
                        series.style.display = "none";  // Use 'none' to hide
                    } else if (brandselection == "select") {
                        newBrandInput.style.display = "none";
                        newBrandInput.disabled = true;
                        seriesInput.disabled = true;
                        series.style.display = "none";
                    } else {
                        newBrandInput.style.display = "none";
                        newBrandInput.disabled = true;
                        series.style.display = "block";
                        series.style.visibility = "visible";
                        seriesInput.disabled = false;
                    }
                }
            </script>
        </section>

    </body>
</html>