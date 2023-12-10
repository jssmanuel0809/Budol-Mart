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
                <p>Indulge in the captivating world of Budol, where<br>
                    innovation meets excitement! Budol seamlessly<br> 
                    blends the thrill of ecommerce with the charm of a<br>
                    retail shop, offering a unique and delightful shopping<br>
                    experience. Immerse yourself in the mystery and<br>
                    anticipation as Budol specializes in selling blind<br> 
                    boxes, each a treasure trove waiting to be<br> 
                    discovered. Elevating your online shopping journey,<br> 
                    our dedicated team ensures a seamless and efficient<br> 
                    system for the shop, guaranteeing a hassle-free and<br> 
                    enjoyable exploration of surprises. Unleash the joy of<br> 
                    Budol and let the adventure unfold with every click!</p>
                
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

        <!-- FOOTER -->
        <footer-component></footer-component>
    </body>
</html>