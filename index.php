<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BUDOL</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
        <!-- COMPONENTS -->
        <script src="components/header.js" type="text/javascript" defer></script>
        <script src="components/footer.js" type="text/javascript" defer></script>
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <header-component></header-component>
        <!-- CONTENTS -->
        <div id="slideshow-container">
            <button class="slideshow-button prev" onclick="plusSlides(-1)">❮</button>
                <div class="mySlides">
                    <img src="images/1.png" style="width: 100%;">
                </div>
                <div class="mySlides">
                    <img src="images/2.png" style="width: 100%;">
                </div>
                <div class="mySlides">
                    <img src="images/3.png" style="width: 100%;">
                </div>
                <button class="slideshow-button next" onclick="plusSlides(1)">❯</button>
        </div>

        <script src="components/index.js"></script>

        <section id="text" class="text">
            <div class="qoute">
                <h1>With Budol,</h1>
                <p>"Unveil the thrill of anticipation with our blind box treasures, where every<br>
                    unopened package holds the promise of a unique and exciting surprise,<br>
                    making each purchase a delightful journey into the unknown!"</p>
            </div>
        </section>

        <!-- FOOTER -->
        <footer-component></footer-component>
    </body>
</html>