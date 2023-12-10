<?php
    session_start();
    require('connectdb.php');
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

<body>
    <header>
        <!--NAVBAR-->
        <div class="banner">
            <section class="navbar">
                <img src="assests/Navbar/logo-no-slogan.png" width="75px" alt="UNITOP logo">
                <h1>UNITOP</h1>
                <div class="links">
                    <nav>
                        <div class="img-links">
                             <!--Customer basket-->
                             <!--<a href=""><img src="images/search.png" class="browse-icon"></a>-->
                             <a href="index.html"><img src="assests/Navbar/home_4991416.png" class="home-icon"></a>
                             <a href=""><img src="assests/Navbar/about-us.png" class="about-us-icon"></a>
                             <a href=""><img src="assests/Navbar/notification_9383540.png" class="contact-us-icon"></a>
                             <a href=""><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a>
                             <a href=""><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a>
                        </div>

                        <div class="nav-links">
                        <ul>
                           <!--<li><a href="">Browse</a></li>-->
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="account.html">Account</a></li>
                            <li><a href="basket.html">Basket</a></li>
                        </ul>
                        </div>
                    
                        <!---Search Bar--->
                        <div class="search-bar">
                            <input type="text" placeholder="Search">
                            <button type="submit"><img src="assests/Navbar/search.png" class="search-icon"></button>
                        </div>
                    </nav>

                   </div>
            </section>
        </div>

          <!--Menu with the categories - each subject-->
        <div class="menu">
            <a href="">Computer Science</a>
            <a href=""> E-sports</a>
            <a href="">Graphics Design</a>
            <a href="">Law</a>
            <a href="">Medicine</a>
        </div>
    </header>

    <!------------------------------MAIN BODY--------------------------------------->
    
    <!--Banner to encourage log-in, necessary to be able to purchase from the store-->
    <div class="banner-log">
        <!--Log In button in big screen-->
        <div class="log-in" style="background-image: url(assests/Banners/banner.jpg);">
            <section class="heading">
                <h1>Educate with UNITOP</h1>
                <p>Choose a laptop that aligns perfectly with your students academic pursuits.
                    <br>Choose the features that matter to your students, from powerful processors 
                    <br>for seamless coding to lightweight designs for the mobility demands of your medics.
                    <br>Choose to empower your students journey through UNITOP.
                </p>
                <a href="login.html" class="button">Log In</a> or
                <a href="register.html" class="button">Sign Up</a>
            </section>
        </div>
    </div>

<!--Product showcase row (arrows would be nice)-->
<div class="prod">
    <h2>Featured Products</h2>
    <section class="row">
        <div class="featured-img">
           <?php include('php/featured.php'); ?>
           
        </div>
    <section>
</div>

<!--About Us+Contact Us - showcase Melissa's work-->
<div class="about">
        <section class="box" style="background-image: url(assests/Banners/about-us.jpg);">
            <h1>Who we are!</h1>
            <p>Dive into our company.</p>
            <a href="" class="button">About Us</a>
        </section>
        <section class="box" style="background-image: url(assests/Banners/contact-us.jpg);">
            <h1>How to reach us!</h1>
            <p>Contact us through here.</p>
            <a href="" class="button">Contact Us</a>
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