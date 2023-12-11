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

    if (isset($_POST['edit_profile'])){
        $name = mysqli_real_escape_string($db, $_POST['fullname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);

        $update_query = "UPDATE CustomerProfiles
        SET CustomerName = '$name', EmailAddress = '$email', PhoneNumber = '$phone'
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
        <link rel="stylesheet" href="style/user-profile.css">
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
            <div class="box">
                <h1>USER PROFILE</h1>
                <div class="form_box">
                    <form class="user_form" method="post" action="user_profile.php">
                        <h3>Username: <?php echo $data['AccountName']?></h3>
                        <!-- <label for="">Password: <input type="password" name="password" value=""></label> -->
                        <label for="">Name: <input type="text" name="fullname" value="<?php echo $info['CustomerName']?>"></label>
                        <label for="">Email: <input type="text" name="email" value="<?php echo $info['EmailAddress']?>"></label>
                        <label for="">Phone Number: <input type="text" name="phone" value="<?php echo $info['PhoneNumber']?>"></label>
                        <div class="edit">
                            <button class="edit_button" type="submit" name="edit_profile">Save Changes</button>
                            <div class="user_links">
                                <a href="user_address.php" class="address">Address: <?php echo $info['City']?></a>
                                <a href="change_password.php" class="address">Change Password</a>
                            </div>
                        </div>
                        <div class="left">
                            <a href="includes/logout.php">Logout</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </body>
</html>
