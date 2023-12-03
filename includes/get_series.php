<?php
include('../includes/server.php');

if (isset($_POST['brand'])) {
    $selectedBrand = mysqli_real_escape_string($db, $_POST['brand']);

    // Fetch series options based on the selected brand
    $query = "SELECT Series
    FROM Series S
    INNER JOIN Brands B ON S.BrandID = B.BrandID
    WHERE Brand = '$selectedBrand'";
    $result = mysqli_query($db, $query);

    if ($result) {
        while ($data = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $data['Series'] . '">' . $data['Series'] . '</option>';
        }
    }
}
?>