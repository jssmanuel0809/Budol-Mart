<?php
include('../includes/server.php');
if (isset($_POST['brand'])) {
    $selectedBrand = mysqli_real_escape_string($db, $_POST['brand']);
    $selectedSeries = mysqli_real_escape_string($db, $_POST['series']);
    $query = "SELECT Series
    FROM Series S
    INNER JOIN Brands B ON S.BrandID = B.BrandID
    WHERE Brand = '$selectedBrand'";
    $result = mysqli_query($db, $query);
    if ($result) {
        while ($data = mysqli_fetch_assoc($result)) {
            $selected = ($selectedSeries == $data['Series']) ? 'selected' : '';
            echo '<option value="' . $data['Series'] . '" ' . $selected . '>' . $data['Series'] . '</option>';
        }
    }
}
?>