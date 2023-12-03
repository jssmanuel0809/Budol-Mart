// DROPDOWN
document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.getElementById('filterButton');
    const dropdownContent = document.querySelector('.dropdown-content');
    const filterOptions = document.querySelectorAll('.filter-option');
    const orderContents = document.querySelector('.order-box-contents');

    // Function to update filter button text and adjust its height
    function updateFilterButton(selectedValue) {
        filterButton.textContent = `Filter: ${selectedValue.charAt(0).toUpperCase() + selectedValue.slice(1)}`;
        filterButton.style.height = `${filterButton.clientHeight}px`; // Adjust height based on content
    }

    // Handle filter button click
    filterButton.addEventListener('click', function () {
        dropdownContent.classList.toggle('show');
    });

    // Handle filter option click
    filterOptions.forEach(option => {
        option.addEventListener('click', function () {
            const selectedValue = option.getAttribute('data-value');
            updateFilterButton(selectedValue);
            
            // Update the filter type for each column in the order box
            const columns = orderContents.querySelectorAll('.column');
            columns.forEach(column => {
                column.setAttribute('data-filter', selectedValue);
            });

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
