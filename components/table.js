document.getElementById('addOrderButton').addEventListener('click', function () {
    const existingRow = document.querySelector('.order-box-contents tbody tr');
    if (existingRow) {
        existingRow.remove();
    }

    const orderDetails = ['#2', 'Mao Mao', 'Pusa', '500'];

    const newRow = document.createElement('tr');

    orderDetails.forEach(detail => {
        const column = document.createElement('td');
        column.textContent = detail;
        newRow.appendChild(column);
    });

    const tableBody = document.querySelector('.order-box-contents tbody');
    tableBody.appendChild(newRow);
});
