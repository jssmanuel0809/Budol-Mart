<?php 
    include('includes/server.php');
    if (isset($_POST['register_buyer'])) {
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirmpw = mysqli_real_escape_string($db, $_POST['confirm']);

        if ($password != $confirmpw) {
            array_push($errors, "The two passwords do not match");
        }

        $user_check_query = "SELECT * FROM Customers WHERE AccountName='$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) {
            if ($user['AccountName'] === $username) {
              array_push($errors, "Username already exists");
            }
        }

        if (count($errors) == 0) {
          
            $hashedpw = md5($password);
            $query = "INSERT INTO Customers (AccountName, AccountPassword) 
                    VALUES('$username', '$hashedpw')";
            $working = mysqli_query($db, $query);

            if ($working){
                $select_acc = "SELECT * FROM Customers
                WHERE AccountName = '$username'";
                $result = mysqli_query($db, $select_acc);
                $acc = mysqli_fetch_assoc($result);
                $customerid = $acc['CustomerID'];

                $insert_query = "INSERT INTO CustomerProfiles (CustomerID, CustomerName, EmailAddress, PhoneNumber)
                VALUES ('$customerid', '$name', '$email', '$phone')";
                $insert = mysqli_query($db, $insert_query);
                if ($insert){
                    $_SESSION['username'] = $username;
                    $_SESSION['status'] = "active";
                    $_SESSION['logged_in'] = true;
                    header('location: index.php');
                }
            }
        }
    }
?>
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
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
        <!-- COMPONENTS -->
        <script src="components/header.js" type="text/javascript" defer></script>
    </head>

    <!-- NAVIGATION BAR -->
    <header-component></header-component>

    <section class="authentication">
        <h3>Register</h3>
        <div class="box">
            <form method="post" action="register.php">
                <fieldset class="row">
                    <input type="text" id="name" name="name" placeholder="Name" required>
                </fieldset>
                <fieldset class="row">
                    <input type="email" id="email" name="email" placeholder="Email Address" required>
                </fieldset>
                <fieldset class="row">
                    <input type="text" id="phone" name="phone" placeholder="Phone Number" pattern="[0-9]{11}" title="Please enter a valid 11-digit phone number" required>
                </fieldset>
                <fieldset class="row">
                    <input type="text" id="username" name="username" placeholder="Username" minlength="6" required>
                </fieldset>
                <fieldset class="row">
                    <input type="password" id="password" name="password" placeholder="Password" minlength="6" pattern="[a-zA-Z0-9]+" title="Special characters are not allowed" required>
                </fieldset>
                <fieldset class="row">
                    <input type="password" id="confirm" name="confirm" placeholder="Confirm Password" minlength="6" pattern="[a-zA-Z0-9]+" title="Special characters are not allowed" required>
                </fieldset>
                <button class="register-button" type="submit" name="register_buyer">REGISTER</button>
            </form>
        </div>
    </section>
    </body>
</html>