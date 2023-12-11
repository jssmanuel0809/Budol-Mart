class Header extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      const currentPath = window.location.pathname;
  
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
                <a href="products.php" class="logo">BUDOL!</a>
            </div>
            <div class="header-content">
                <nav>
                    <ul class="nav_links">
                        <li><a href="products.php">PRODUCTS</a></li>
                        <li><a href="orders.php">ORDERS</a></li>
                    </ul>
                </nav>
                <a href="../includes/admin_logout.php" class="user">LOG OUT</a>
            </div>
        </header>
      `;
    }
  }
  
  customElements.define('header-component', Header);
  