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

//DROPDOWN
document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.getElementById('filterButton');
    const dropdownContent = document.querySelector('.dropdown-content');
    const filterOptions = document.querySelectorAll('.filter-option');
    const currentFilterDisplay = document.getElementById('currentFilterDisplay');

    // Handle filter button click
    filterButton.addEventListener('click', function () {
        dropdownContent.classList.toggle('show');
    });

    // Handle filter option click
    filterOptions.forEach(option => {
        option.addEventListener('click', function () {
            const selectedValue = option.getAttribute('data-value');
            currentFilterDisplay.textContent = `Filter: ${selectedValue.charAt(0).toUpperCase() + selectedValue.slice(1)}`;
            console.log('Selected filter:', selectedValue);
            dropdownContent.classList.remove('show'); // Close the dropdown after selecting an option
        });
    });

    // Close the dropdown when clicking outside of it
    window.addEventListener('click', function (event) {
        if (!event.target.matches('.button')) {
            dropdownContent.classList.remove('show');
        }
    });
});

