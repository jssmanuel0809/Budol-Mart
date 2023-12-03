<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BUDOL Orders Buyer</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- LINKS -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/orders.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
    <script src="components/header.js" type="text/javascript" defer></script>
    <script src="components/filter.js" type="text/javascript" defer></script>
</head>

<body>
    <header-component></header-component>

    <section id="order" class="order">
        <div class="order-box">
            <h1>Orders</h1>
            <div class="filters">
                <form id="search" method="post" action="search.php">
                    <input type="text" name="searching" placeholder="SEARCH">
                </form>
                <div class="dropdown">
                    <button id="filterButton" class="button">Filter: All</button>
                    <div class="dropdown-content">
                        <a href="#" class="filter-option" data-value="all">All Orders</a>
                        <a href="#" class="filter-option" data-value="pending">Pending</a>
                        <a href="#" class="filter-option" data-value="completed">Completed</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="order-box-contents">
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Date of Order</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Estimated Time of Arrival</th>
                </tr>
            </thead>
            <tbody>
                <!-- to be deleted na part, placeholder lang kung gumagana -->
                <!-- Sample row -->
                <tr>
                    <td>#111</td>
                    <td>November 21, 2023</td>
                    <td>100 PHP</td>
                    <td>Shipped</td>
                    <td>December 1, 2023</td>
                </tr>
            </tbody>
        </table>
    </div>

    <button id="addOrderButton">Add Order</button>

    <script>
        document.getElementById('addOrderButton').addEventListener('click', function () {
            // Sample order details (replace with dynamic data)
            const orderDetails = ['#112', 'December 1, 2023', '150 PHP', 'Processing', 'December 10, 2023'];

            // Create a new row
            const newRow = document.createElement('tr');

            // Append order details as columns to the new row
            orderDetails.forEach(detail => {
                const column = document.createElement('td');
                column.innerHTML = detail;
                newRow.appendChild(column);
            });

            // Append the new row to the table body
            const tableBody = document.querySelector('.order-box-contents tbody');
            tableBody.appendChild(newRow);
        });
    </script>
</body>

</html>