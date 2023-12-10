<?php
include('../includes/server.php');
include('../includes/admin_protections.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BUDOL Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- LINKS -->
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/index_admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
    <!-- COMPONENTS -->
    <script src="../components/admin_header.js" type="text/javascript" defer></script>
    <script src="../components/index_admin.js" type="text/javascript" defer></script>
    <script src="../components/table.js" type="text/javascript" defer></script>
</head>
<body>
    <header-component></header-component>
<div class="container">
    <div class="toggle">
        <div class="box" onclick="toggleValues('orders', this)">
            <div class="order-type">Ave Orders</div>
            <div class="number">50</div>
            <div class="percentage">%</div>
        </div>

        <div class="box" onclick="toggleValues('sales', this)">
            <div class="order-type">Ave Sales</div>
            <div class="number">500</div>
            <div class="percentage">%</div>
        </div>
    </div>

    <div class="order-box-contents">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Items</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample row -->
                <tr>
                    <td>#1</td>
                    <td>Mickey Mouse</td>
                    <td>Disney</td>
                    <td>1000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    <button id="addOrderButton">Add Order</button>

    <script>
        document.getElementById('addOrderButton').addEventListener('click', function () {
            // Sample order details (replace with dynamic data)
            const orderDetails = ['#2', 'Mao Mao', 'Pusa', '500'];

            // Create a new row
            const newRow = document.createElement('tr');

            // Append order details as columns to the new row
            orderDetails.forEach(detail => {
                const column = document.createElement('td');
                column.textContent = detail;
                newRow.appendChild(column);
            });

            // Append the new row to the table body
            const tableBody = document.querySelector('.order-box-contents tbody');
            tableBody.appendChild(newRow);
        });
    </script>
</body>
</html>
