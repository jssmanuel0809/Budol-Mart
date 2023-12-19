document.getElementById('addOrderButton').addEventListener('click', function () {
    const newRow = document.createElement('div');
    newRow.classList.add('row');

    const orderDetails = ['#112', 'December 1, 2023', '150 PHP', 'Processing', 'December 10, 2023'];

    orderDetails.forEach(detail => {
        const column = document.createElement('div');
        column.classList.add('column');
        column.innerHTML = `<p>${detail}</p>`;
        newRow.appendChild(column);
    });

    const orderContents = document.querySelector('.order-box-contents');
    orderContents.appendChild(newRow);
});