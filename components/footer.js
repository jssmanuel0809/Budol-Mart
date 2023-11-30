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
                background-color: #F5E6CA;
                padding-left: 20px;
                padding-right: 20px;
                height: 15vh;
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