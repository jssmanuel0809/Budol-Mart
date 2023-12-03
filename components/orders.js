//dapat maga-adjust yung box kada dagdag ng element

document.getElementById('addOrderButton').addEventListener('click', function () {
    // Create a new row
    const newRow = document.createElement('div');
    newRow.classList.add('row');

    // Sample order details (replace with dynamic data)
    const orderDetails = ['#112', 'December 1, 2023', '150 PHP', 'Processing', 'December 10, 2023'];

    // Append order details as columns to the new row
    orderDetails.forEach(detail => {
        const column = document.createElement('div');
        column.classList.add('column');
        column.innerHTML = `<p>${detail}</p>`;
        newRow.appendChild(column);
    });

    // Append the new row to the .order-box-contents
    const orderContents = document.querySelector('.order-box-contents');
    orderContents.appendChild(newRow);
});

