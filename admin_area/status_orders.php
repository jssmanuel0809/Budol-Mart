<?php
include('../includes/server.php');
include('../includes/admin_protections.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Status | BUDOL Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- LINKS -->
    <link rel="stylesheet" href="../style/temp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">

    <script src="../components/temp.js" type="text/javascript" defer></script>
</head>
<body>
    <section class="box">
        <a href="orders.php">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                <path fill="#454545" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
            </svg>
        </a>

        <div class="box-contents">
            <div class="start">
                <h1>Order (insert order number)</h1>
            </div>
            <div class="end">
                <h3 id="status">Completion 0/3</h3>
            </div>
        </div>
        <div class="">
                
            <div class="container">
                <div class="checkbox">
                    <input type="checkbox" id="orderConfirmation" disabled>
                    <label for="orderConfirmation">Order Confirmation</label>
                </div>
                
                <div class="checkbox">
                    <input type="checkbox" id="shippedPacked" disabled>
                    <label for="shippedPacked">Shipped/Packed</label>
                </div>
                
                <div class="checkbox">
                    <input type="checkbox" id="complete" disabled>
                    <label for="complete">Complete</label>
                </div>

                <div class="button-container">
                    <button id="editBtn" onclick="toggleEditMode()">Edit</button>
                    <button id="saveBtn" onclick="saveChanges()" style="display: none;">Save</button>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
