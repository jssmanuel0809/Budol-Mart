
class Header extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      const currentPath = window.location.pathname;
      const username = this.getAttribute('username');
      const session_status = this.getAttribute('status');

      let loginElement = '';
      let cartElement = '';
      let orderElement = '';
      if (session_status == "active") {
        cartElement = '<li><a href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path fill="#3d4c6c" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></a></li>';
        orderElement = '<li><a href="orders.php">ORDERS</a></li>';
        loginElement = '<a href="user_profile.php" class="user">  ' + username +'</a>';
      }
      else {
        loginElement = '<a href="login.php" class="user">LOG IN</a>';
      }
  
      this.innerHTML = `
        <head>
            <style>
                header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    background-color: #95A9CB;
                    padding-left: 20px;
                    height: 8vh;
                    z-index: 1;
                }
                .header {
                    width: 100%;
                    position: fixed;
                    overflow: hidden;
                    top: 0;
                }
                .header-content {
                    display: flex;
                    justify-content: space-between;
                    align-items: center
                }
                .logo {
                    font-family: 'Righteous', sans-serif;
                    color: #FCF1E6;
                    text-decoration: none;
                    letter-spacing: 10px;
                    font-size: 38px;
                    margin-right: 15px;
                }
                input[name="search"] {
                    width: 218px;
                    border: 2px solid #526C99;
                    border-radius: 25px;
                    background-color: #FFFFFF;
                    padding: 8px 20px;
                    margin: 8px 0;
                    opacity: 75%;
                    display: ${currentPath.includes('orders.php') ? 'none' : 'block'};
                }
                .nav_links a {
                    font-family: 'Dongle', sans-serif;
                    color: #3D4C6C;
                    text-decoration: none;
                }
                .nav_links {
                    list-style: none;
                    display: flex;
                    font-size: 40px;
                }
                .nav_links li {
                    padding: 5px 50px;
                }
                
  
                .header-content .user {
                    background-color: #F6B185;
                    color: #FCF1E6;
                    text-decoration: none;
                    font-family: 'Dongle', sans-serif;
                    font-weight: bold;
                    font-size: 40px;
                    padding: 5px;
                    padding-left: 25px;
                    padding-right: 25px;
                }
            </style>
        </head>
        <header class="header">
            <div class="header-content">
                <a href="index.php" class="logo">BUDOL!</a>
                <form id="search" method="post" action="search.php">
                    <input type="text" name="search" placeholder="SEARCH">
                </form>
            </div>
            <div class="header-content">
                <nav>
                    <ul class="nav_links">
                        <li><a href="products.php">PRODUCTS</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        ${orderElement}
                        ${cartElement}
                    </ul>
                </nav>
                ${loginElement}
            </div>
        </header>
      `;
    }
  }
  
  customElements.define('header-component', Header);
  