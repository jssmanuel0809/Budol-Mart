class Footer extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      this.innerHTML = `
    <head>
        <style>
            .footer {
                display: flex;
                position: relative;
                width: 100%;
                bottom: 0px;
                background-color: #95A9CB;
                height: 20vh;
                transform: translate(0%,400%);
                top: 70%;
                opacity: 70%;
            }
        </style>
    </head>
    <body>
        <footer class="footer">
            <h3>FOOTER</h3>
        </footer>
    </body>
        `
        ;
  }
}

customElements.define('footer-component', Footer);