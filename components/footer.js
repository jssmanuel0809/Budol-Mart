class Footer extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      this.innerHTML = `
    <head>
        <style>
            .footer {
                position: relative;
                width: 100%;
                bottom: 0px;
                background-color: #95A9CB;
                height: 35vh;
                transform: translate(0%,226%);
                top: 70%;
                opacity: 70%;
            }
            .footer-contents {
                display: flex;
                flex-direction: row;
                font-family: 'Dongle', sans-serif;
                font-size: 24px;
                padding: 15px;
                padding-left: 25px;
                justify-content: space-around;
            }

            .footer-contents h3{
                font-weight: bold;
                font-size: 32px;
            }

            .nav1, .nav2, .nav3, .nav4 {
                display: flex;
                flex-direction: column;
                color: #FFFFFF;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <footer class="footer">
            <div class="footer-contents">
                <section class="nav1">
                    <h3>CONTACT US</h3>
                    <p><a href="">budolph@gmail.com</a></p>
                    <p>+63 998 900 6369</p>
                </section>

                <section class="nav2">
                    <h3>HELP</h3>
                    <p><a href="">FAQs</a></p>
                </section>

                <section class="nav3">
                    <h3>BUDOL</h3>
                    <p><a href="">Aira Bucu</a></p>
                    <p><a href="">Alyzah Ebora</a></p>
                    <p><a href="">Jemima Manuel</a></p>
                </section>

                <section class="nav4">
                    <h3>FOLLOW US</h3>
                    <p><a href="">facebook.com/budolph</a></p>
                    <p><a href="">@budolphtwt</a></p>
                    <p><a href="">@budolphinsta</a></p>
                </section>
                </div>
            </div>
        </footer>
    </body>
        `
        ;
  }
}

customElements.define('footer-component', Footer);