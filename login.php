<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BUDOL | Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amarante&family=Darker+Grotesque:wght@400;600;700;900&display=swap" rel="stylesheet">
        <!-- COMPONENTS -->
        <script src="components/header.js" type="text/javascript" defer></script>
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <header-component></header-component>

        <section class="login-content">
            <h3>Login</h3>
            <div class="box" id="box">
                <form method="post" action="login.php">
                    <input type="text" id="username" name="username" placeholder="username">
                    <input type="password" id="password" name="password" placeholder="password">
                    <button class="login-button" type="submit" name="login_user">LOGIN</button>
                </form>
                <!-- <a class="forgot" href="">FORGOTTEN PASSWORD?</a> -->
                <!-- <hr class="solid">
                <button id="toggleButton" onclick="toggleContainer()">CREATE <br> ACCOUNT</button>
                <div id="buttonContainer"></div> -->                
            </div>
        </section>

    </body>
</html>