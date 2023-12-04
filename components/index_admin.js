function toggleValues(type, clickedBox) {
  const orderType = clickedBox.querySelector('.order-type');
  const number = clickedBox.querySelector('.number');
  const percentage = clickedBox.querySelector('.percentage');

  if (type === 'orders') {
    const isAveOrders = orderType.textContent === 'Ave Orders';

    if (isAveOrders) {
      // Toggle to Total Orders
      orderType.textContent = 'Total Orders';
      number.textContent = '1000'; // Replace with your actual total values
      percentage.textContent = '%';
    } else {
      // Toggle back to Ave Orders
      orderType.textContent = 'Ave Orders';
      number.textContent = '50'; // Replace with your actual average values
      percentage.textContent = '%';
    }
  } else if (type === 'sales') {
    const isAveSales = orderType.textContent === 'Ave Sales';

    if (isAveSales) {
      // Toggle to Total Sales
      orderType.textContent = 'Total Sales';
      number.textContent = '2000'; // Replace with your actual total sales
      percentage.textContent = '%';
    } else {
      // Toggle back to Ave Sales
      orderType.textContent = 'Ave Sales';
      number.textContent = '500'; // Replace with your actual average sales
      percentage.textContent = '%';
    }
  }
}
