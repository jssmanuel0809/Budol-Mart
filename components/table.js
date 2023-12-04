document.getElementById('addOrderButton').addEventListener('click', function () {
    // Remove the existing sample row
    const existingRow = document.querySelector('.order-box-contents tbody tr');
    if (existingRow) {
        existingRow.remove();
    }

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
