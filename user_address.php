<?php 
    include('includes/server.php');
    include('includes/protect.php');
    $user = $_SESSION['username'];
    $select_query = "SELECT * FROM Customers
    WHERE AccountName = '$user'";
    $results = mysqli_query($db, $select_query);
    $data = mysqli_fetch_assoc($results);
    $customerid = $data['CustomerID'];

    $select_profile = "SELECT * FROM CustomerProfiles
    WHERE CustomerID = '$customerid'";
    $profile = mysqli_query($db, $select_profile);
    $info = mysqli_fetch_assoc($profile);

    if (isset($_POST['edit_address'])){
        $home = mysqli_real_escape_string($db, $_POST['home']);
        $barangay = mysqli_real_escape_string($db, $_POST['barangay']);
        $city = mysqli_real_escape_string($db, $_POST['city']);
        $province = mysqli_real_escape_string($db, $_POST['province']);

        $update_query = "UPDATE CustomerProfiles
        SET HomeAddress = '$home', Barangay = '$barangay', City = '$city', Province = '$province'
        WHERE CustomerID = '$customerid'";
        mysqli_query($db, $update_query);

        header('refresh: 0');
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BUDOL | User Profile</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/user_edit.css">
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

        <section class="content">
            <div class="">
                <h1>USER ADDRESS</h1>
                <div class="form_box">
                    <form class="user_form" method="post" action="user_address.php">
                        <label for="">Home Address: <input type="text" name="home" value="<?php echo $info['HomeAddress']?>"></label>
                        <label for="">Barangay: <input type="text" name="barangay" value="<?php echo $info['Barangay']?>"></label>
                        <label for="">City: <input type="text" name="city" value="<?php echo $info['City']?>"></label>
                        <label for="">Province: <input type="text" name="province" value="<?php echo $info['Province']?>"></label>
                        <button class="edit_button" type="submit" name="edit_address">Save Changes</button>
                    </form>
                </div>
                <div class="left">
                    <a href="user_profile.php">User Profile</a>
                    <!-- <a href="orders.php">Orders</a> -->
                    <a href="includes/logout.php">Logout</a>
                </div>
            </div>
        </section>

    </body>
</html>
