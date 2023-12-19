<?php 
    include('../includes/server.php');

    if (isset($_POST['login_admin'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
    
        $hashedpassword = md5($password);
        $query = "SELECT * FROM ShopAdmin WHERE AdminAccount='$username' AND AdminPassword='$hashedpassword'";
        $results = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($results);
        if ($data){
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['admin'] = $data['AdminAccount'];
            $_SESSION['admin_status'] = "active";
            header('location: products.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
        }
        else{
        array_push($errors, "Login error");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login | BUDOL Admin Portal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="../style/login.css">
        <link rel="stylesheet" href="../style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
    </head>

    <body>
        <!-- LOGIN CONTENT -->
        <section class="authentication">
            <h3>Admin Portal</h3>
            <div class="box" id="box">
                <form method="post" action="login.php">
                    <input type="text" name="username" placeholder="username" required />
                    <input type="password" name="password" placeholder="password" required />
                    <button class="login-button" type="submit" name="login_admin">LOG IN</button>
                </form>
            </div>
        </section>
    </body>
</html>