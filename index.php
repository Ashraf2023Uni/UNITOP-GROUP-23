<?php
    session_start();
    require('php/connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>UNITOP/HomePage</title>
    <link rel="stylesheet" href="css/home-page.css">
    <link rel="shortcut icon" type="icon" href="assests/Banners/logo.png">
</head>

<!--Main body-->
<body>
    <header>
        <!--NAVBAR-->
        <div class="banner">
            <section class="navbar">
                <img src="assests/Navbar/UT-new-logo.png" width="100px" alt="UNITOP logo">

                <!--Navbar - Links to other pages-->
                <div class="links">
                    <nav>
                        <div class="img-links">
                             <a href="index.php"><img src="assests/Navbar/home_4991416.png" class="home-icon"></a>
                             <a href="about-us.html"><img src="assests/Navbar/about-us.png" class="about-us-icon"></a>
                             <a href="contact.html"><img src="assests/Navbar/notification_9383540.png" class="contact-us-icon"></a>
                             <a href="index.php"><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a>
                             <a href="basket.php"><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a>
                             <a href="admin_login.php"><img src="assests/Navbar/staffpic.png" class="staff-icon"></a>
                             
                        </div>
                        <div class="nav-links">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="index.php">Account</a></li>
                                <li><a href="basket.php">Basket</a></li>
                                <li><a href="admin_login.php">Staff login</a></li>
                            </ul>
                        </div>
                        <!---Search Bar--->
                        <div class="search-bar">
                            <input type="search" id="search" placeholder="Search laptops">
                            <button type="submit"><img src="assests/Navbar/search.png" class="search-icon"></button>
                        </div>
                    </nav>

                </div>
            </section>
        </div>
    </header>

        <!--Banner to encourage log-in, necessary to be able to purchase from the store-->
        <div class="banner-log">
        <div class="log-in" style="background-image: url(assests/Banners/banner.jpg);">
            <section class="heading">
                <h1>Educate with UNITOP</h1>
                <p>Choose a laptop that aligns perfectly with your students academic pursuits.
                    <br>Choose the features that matter to your students, from powerful processors 
                    <br>for seamless coding to lightweight designs for the mobility demands of your medics.
                    <br>Choose to empower your students journey through UNITOP.
                </p>
            <section class="heading-links">
                <a href="login.php" class="button">Log In</a> or
                <a href="register.php" class="button">Sign Up</a>
            </section>

            </section>
        </div>
    </div>
    <!------------------------------MAIN BODY--------------------------------------->

<!--Menu with the categories - popular degreee-->
<div class="menu">
    <a href="explore-page.php">Computer Science</a>
    <a href="menu.php"> E-sports</a>
    <a href="">Graphics Design</a>
    <a href="">Law</a>
    <a href="">Medicine</a>
</div>

<!--Product showcase row (arrows would be nice)-->
<div class="prod">
    <h2>Featured Products</h2>
    <section class="row">
        <div class="featured-img">
           <?php include('php/featured.php');?>
        </div>
    <section>
</div>

<!--About Us+Contact Us-->
<div class="about">
        <section class="box" style="background-image: url(assests/Banners/about-us.jpg);">
            <h1>Who we are!</h1>
            <p>Dive into our company.</p>
            <a href="about-us.hmtml" class="button">About Us</a>
        </section>
        <section class="box" style="background-image: url(assests/Banners/contact-us.jpg);">
            <h1>How to reach us!</h1>
            <p>Contact us through here.</p>
            <a href="contact.html" class="button">Contact Us</a>
        </section>
</div>

<!-------------------FOOTER---------------------->
<footer>
<div class="footer">
    <div class="footer-box">
        <img src="assests/Navbar/logo-no-slogan.png">
        <h3>UNITOP</h3>
        <p>Educate with UNITOP!</p>
        <a href="login.html" class="btn">Log In</a>
    </div>

    <div class="footer-box">
        <h3>Follow Us</h3>
        <div class="socials">
            <img src="assests/Footer/instagram.png">
            <img src="assests/Footer/facebook.png">
            <img src="assests/Footer/linkedin.png"> 
        </div>
    </div>

    <div class="footer-box">
        <h3>About Us</h3>
        <ul>
            <li><a href="">Who We Are</a></li>
            <br>
            <li><a href="">Our Mission</a></li>
            <br>
            <li><a href="">The Team</a></li>
        </ul>
    </div>

    <div class="footer-box">
        <h3>Useful Links</h3>
        <ul>
            <li><a href="">Home</a></li>
            <br>
            <li><a href="">Contact Us</a></li>
            <br>
            <li><a href="">About Us</a></li>
        </ul>
    </div>
</div>
<div class="line">
      <p>Terms and Conditions apply* | UNITOP Limited</p>
</div>

</footer>

</body>
</html> 

<script type="text/javascript" src="index.js"></script> 