<?php 
    include('includes/server.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BUDOL  | About</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- LINKS -->
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/about.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Righteous&family=VT323&display=swap" rel="stylesheet">
        <!-- COMPONENTS -->
        <script src="components/header.js" type="text/javascript" defer></script>
        <script src="components/footer.js" type="text/javascript" defer></script>
        <script src="components/slider.js" type="text/javascript" defer></script>
    </head>
    <body>

        <!-- NAVIGATION BAR -->
        <header-component username="<?php echo $_SESSION['username']; ?>" status="<?php echo $_SESSION['status']; ?>"></header-component>

        <section class="content">
            <div class="box">
                <p>Indulge in the captivating world of Budol, where innovation meets<br>
                    excitement! Budol seamlessly blends the thrill of ecommerce with<br>
                    the charm of a retail shop, offering a unique and delightful<br>
                    shopping experience. Immerse yourself in the mystery and<br>
                    anticipation as Budol specializes in selling blind boxes,<br> 
                    discovered. Elevating your online shopping journey, our<br> 
                    dedicated team ensures a seamless and efficient system for the<br> 
                    shop, guaranteeing a hassle-free and enjoyable exploration of<br> 
                    surprises. Unleash the joy of Budol and let the adventure unfold<br> 
                    with every click!
                
                    <div id="slider-container">
                    <img class="slider-image" src="images/img1.jpg" alt="Image 1">
                    <img class="slider-image" src="images/img2.jpg" alt="Image 2">
                    <img class="slider-image" src="images/img3.jpg" alt="Image 3">
                    <!-- Add more images as needed -->

                    <button id="prev-btn" onclick="changeSlide(-1)">&#60;</button>
                    <button id="next-btn" onclick="changeSlide(1)">&#62;</button>
                    </div>
            </div>
        </section>

        <section class="lower">
            <div class="image-container">
                <div class="circular-image">
                    <img src="images/aira.jpeg" alt="Image-first" class="Image-first">
                </div>
                <div class="image-text">
                    <h3>Text for Image 1</h3>
                </div>
            </div>

            <div class="image-container">
                <div class="circular-image">
                    <img src="images/jemi.jpg" alt="Image-middle">
                </div>
                <div class="image-text">
                    <h3>Text for Image 2</h3>
                </div>
            </div>

            <div class="image-container">
                <div class="circular-image">
                    <img src="images/aly.jpg" alt="Image-last">
                </div>
                <div class="image-text">
                    <h3>Text for Image 3</h3>
                </div>
            </div>
        </section>
        <!-- FOOTER -->
        <footer-component></footer-component>
    </body>
</html>