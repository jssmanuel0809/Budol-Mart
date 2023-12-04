function toggleEditMode() {
    const checkboxes = document.querySelectorAll('.checkboxes input[type="checkbox"]');
    const editBtn = document.getElementById('editBtn');
    const saveBtn = document.getElementById('saveBtn');

    checkboxes.forEach(checkbox => {
        checkbox.disabled = !checkbox.disabled; // Toggle checkbox disabled state
        checkbox.checked = false; // Uncheck all checkboxes when entering edit mode
    });

    editBtn.style.display = 'none';
    saveBtn.style.display = 'inline-block';
}

function saveChanges() {
    const checkboxes = document.querySelectorAll('.checkboxes input[type="checkbox"]');
    const editBtn = document.getElementById('editBtn');
    const saveBtn = document.getElementById('saveBtn');
    const statusElement = document.getElementById('status');

    const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
    const totalCount = checkboxes.length;

    statusElement.textContent = `Completion ${checkedCount}/${totalCount}`;

    checkboxes.forEach(checkbox => {
        checkbox.disabled = true; // Disable checkboxes after saving changes
    });

    editBtn.style.display = 'inline-block';
    saveBtn.style.display = 'none';
}
