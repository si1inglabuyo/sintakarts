<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="css/landing-page.css">
</head>
<body>
    <!--Header / Navbar-->
    <header>
        <nav class ="navbar section-content">
            <a href="#" class = "nav-logo">
                <h2 class = "logo-text">PUPKART</h2>
            </a>
            <ul class="nav-menu">
                <button id="menu-close-button" class="fas fa-times"></button>

                <li class ="nav-item">
                    <a href="landing-page.php" class ="nav-link">Home</a>
                </li>
                <li class ="nav-item">
                    <a href="#" class ="nav-link">About</a>
                </li>
                <li class ="nav-item">
                    <a href="#" class ="nav-link">Menu</a>
                </li>
                <li class ="nav-item">
                    <a href="#" class ="nav-link">Gallery</a>
                </li>
                <li class ="nav-item">
                    <a href="#" class ="nav-link">Contact</a>
                </li>
            </ul>

            <button id="menu-open-button" class="fas fa-bars"></button>
        </nav>
    </header>

    <main>
        <!--Hero section-->
        <section class ="hero-section">
            <div class="section-content">
                <div class ="hero-details">
                    <h2 class="title">Shop with us!</h2>
                    <h3 class="subtitle">Where your convenience will always be essential</h3>
                    <p class="description">Sintakart anticipates your needs and connects you to the best
                        products and offers, making every purchase smarter, simpler, and more rewarding.
                    </p>
                    <div class="buttons">
                        <a href="register.php" class="button order-now">Order Now</a>
                        <a href="#" class="button contact-us">Contact Us</a>
                    </div>
                </div>
                <div class="hero-image-wrapper">
                    <img src="images/landing-page-logo.png" alt="Hero" class="hero-image">
                </div>
            </div> 
        </section>
    </main>

<script src="js/landing-page.js"></script>
</body>
</html>


