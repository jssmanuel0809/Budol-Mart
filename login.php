<?php 
    include('includes/server.php');
    if (isset($_POST['login_user'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
    
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM Customers WHERE AccountName='$username' AND AccountPassword='$password'";
            $results = mysqli_query($db, $query);
            $data = mysqli_fetch_assoc($results);
            if ($data){
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $data['AccountName'];
                $_SESSION['status'] = "active";
                $_SESSION["logged_in"] = true;
                header('location: index.php');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
            }
            else{
            array_push($errors, "Login error");
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
        <header-component></header-component>

        <section class="authentication">
            <h3>Login</h3>
            <div class="box" id="box">
                <form method="post" action="login.php">
                    <input type="text" id="username" name="username" placeholder="username">
                    <input type="password" id="password" name="password" placeholder="password">
                    <button class="login-button" type="submit" name="login_user">LOGIN</button>
                </form>
                <div class="reg-link">
                    <p>Not yet registered? Register <a href="register.php">HERE</a>.</p>
                </div>
                <!-- <a class="forgot" href="">FORGOTTEN PASSWORD?</a> -->
                <!-- <hr class="solid">
                <button id="toggleButton" onclick="toggleContainer()">CREATE <br> ACCOUNT</button>
                <div id="buttonContainer"></div> -->                
            </div>
        </section>

    </body>
</html>