<?php 
    include('includes/server.php');
    include('includes/protect.php');

    $user = $_SESSION['username'];
    $select_query = "SELECT * FROM Customers
    WHERE AccountName = '$user'";
    $results = mysqli_query($db, $select_query);
    $data = mysqli_fetch_assoc($results);
    $customerid = $data['CustomerID'];

    if (isset($_POST['change_pass'])){
        $current = mysqli_real_escape_string($db, $_POST['current']);
        $new = mysqli_real_escape_string($db, $_POST['new']);
        $retyped = mysqli_real_escape_string($db, $_POST['retyped']);
        $curr = md5($current);
        if ($data['AccountPassword'] != $curr) {
            array_push($errors, "Incorrent password.");
        }
        if ($new != $retyped) {
            array_push($errors, "The two passwords do not match");
        }
        if (count($errors) == 0){
            $hashedpw = md5($new);
            $update_query = "UPDATE Customers
            SET AccountPassword = '$hashedpw'
            WHERE CustomerID = '$customerid'";
            $working = mysqli_query($db, $update_query);

            if ($working){
                header('location: includes/logout.php');
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login | Budol</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
        <!-- COMPONENTS -->
        <script src="components/header.js" type="text/javascript" defer></script>
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <header-component username="<?php echo $_SESSION['username']; ?>" status="<?php echo $_SESSION['status']; ?>"></header-component>

        <section class="authentication">
            <h3>Change Password</h3>
            <div class="box" id="box">
                <form method="post" action="change_password.php">
                    <input type="password" name="current" placeholder="Current Password">
                    <input type="password" name="new" placeholder="New Password">
                    <input type="password" name="retyped" placeholder="Confirm New Password">
                    <button class="login-button" type="submit" name="change_pass">Save Changes</button>
                </form>              
            </div>
        </section>

    </body>
</html>