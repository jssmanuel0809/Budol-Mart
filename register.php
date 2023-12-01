<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register | BUDOL</title>
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

    <!-- NAVIGATION BAR -->
    <header-component></header-component>

    <section class="authentication">
        <h3>Register</h3>
        <div class="box">
            <form method="post" action="">
                <fieldset class="row">
                    <input type="text" id="name" name="name" placeholder="Name">
                </fieldset>
                <fieldset class="row">
                    <input type="text" id="email" name="email" placeholder="Email Address">
                </fieldset>
                <fieldset class="row">
                    <input type="text" id="phone" name="phone" placeholder="Phone Number">
                </fieldset>
                <fieldset class="row">
                    <input type="text" id="username" name="username" placeholder="Username">
                </fieldset>
                <fieldset class="row">
                    <input type="password" id="password" name="password" placeholder="Password">
                </fieldset>
                <fieldset class="row">
                    <input type="password" id="confirm" name="confirm" placeholder="Confirm Password">
                </fieldset>
                <button class="register-button" type="submit" name="register_buyer">REGISTER</button>
            </form>
        </div>
    </section>
    </body>
</html>