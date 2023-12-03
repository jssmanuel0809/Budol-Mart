<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login | BUDOL Admin Portal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="../style/admin.css">
        <link rel="stylesheet" href="../style/login.css">
        <link rel="stylesheet" href="../style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amarante&family=Darker+Grotesque:wght@400;600;700;900&display=swap" rel="stylesheet">

        <script src="../components/admin_header.js" type="text/javascript" defer></script>
    </head>

    <body>
        <header-component></header-component>
        <!-- LOGIN CONTENT -->
        <section class="authentication">
            <h3>Admin Portal</h3>
            <div class="box" id="box">
                <form method="post" action="adminLogin.php">
                    <input type="text" name="username" placeholder="username" required />
                    <input type="password" name="password" placeholder="password" required />
                    <button class="login-button" type="submit" name="login_admin">LOG IN</button>
                </form>
            </div>
        </section>
    </body>
</html>