<!--HomePage for customers - Humayra Hussain, 210005848 + Mohammed Ali (Checks to see if customers are logged in)-->
<?php
session_start();
    require('php/connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>UNITOP/HomePage</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/home-page.css"/>
    <link rel="shortcut icon" type="icon" href="assests/Banners/logo.png"/>
</head>

<body>
    <!--Header - brand logo and navigation bar-->
    <header>
        <!--LOGO-->
        <div class="navbar">
            <img src="assests/Navbar/UT-new-logo.png" width="100px" alt="UNITOP logo">
            
            <!--Search bar - products to be searched through by name-->
            <?php include('php/search.php'); ?>
            
            <!--NAVIGATION BAR-->
            <div class="links">
                <nav>
                    <div class="img-links">
                        <a href="index.php"><img src="assests/Navbar/home_4991416.png" class="home-icon"></a>
                        <a href="accounts.php"><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a>
                        <a href="basket.php"><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a>
                        <a href="admin_pin.php"><img src="assests/Navbar/staffpic.png" class="staff-icon"></a>
                    </div>
                    <div class="page-links">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="accounts.php">Account</a></li>
                            <li><a href="basket.php">Basket</a></li>
                            <li><a href="admin_pin.php">Staff login</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!--Menu with the categories based on degrees of students-->
    <div class="menu">
        <?php 
        include('php/category.php');
        $categories = getCategories($db);
        /*print_r($categories);*/
        foreach ($categories as $category){
            echo "<a href='products-page.php?category={$category['category_id']}'>{$category['category']}></a>";
        }
        ?>
    </div>

    <!--<?php if (isset($_SESSION['email'])): ?>
        <div class="welcome-message">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?></h1>
        </div>
    <?php endif; ?> -->
    
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
    <!-- Logout Button -->
    <form action="logout.php" method="post">
    <button type="submit" name="logout" class="logout-button">Log Out</button>
    </form>
    <?php endif; ?>

    <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true): ?>
    <!--Banner to encourage log-in, necessary to be able to purchase from the store-->
    <div class="banner-log">
    <div class="log-in" style="background-image: url(assests/Banners/banner-computer.jpg);">
        <div class="heading">
            <h1>Educate with UNITOP</h1>
            <p>Choose a laptop that aligns perfectly with your students academic pursuits.
                <br>Choose the features that matter to your students, from powerful processors
                <br>for seamless coding to lightweight designs for the mobility demands of your medics.
                <br>Choose to empower your students journey through UNITOP.
            </p>
            <section class="heading-links">
                <a href="login.php" class="button" id="login-btn">Log In</a> or
                <a href="register.php" class="button">Sign Up</a>
            </section>
        </div>
    </div>
    </div>
    <?php endif; ?>

    <!--Product showcase row (arrows would be nice)-->
    <div class="featured-products">
        <h2>Featured Laptops for your Degree</h2>
        <p>Discover our selection of top-rated laptops to elevate your students' educational journey.</p>
            <div class="product-row">
                <?php include('php/featured.php'); ?>
            </div>
    </div>

    <!--About Us and Contact Us Banner-->
    <div class="about-p">
        <p>Discover who we are or Get in Touch today</p>
    </div>
    <div class="about">
        <section class="box" style="background-image: url(assests/Banners/about.jpg);">
            <h1>Who we are!</h1>
            <p>At UNITOP, we're dedicated to elevating your students educational journey. 
                Our vision began with proving ease in your laptop purchases. 
                Learn more about us and how we strive to make your students learning better.
            </p>
            <a href="about-us.hmtml" class="button">About Us</a>
        </section>
        <section class="box" style="background-image: url(assests/Banners/contact.jpg);">
            <h1>How to reach us!</h1>
            <p>
                We are here to assist you every step of the way.
                Whether you have a question or need assitance, our team is here to help.
                Your feedback is invaluable to us and we look forward to hearing from you.
                Get in touch today.
            </p>
            <a href="contact.html" class="button">Contact Us</a>
        </section>
    </div>

    <!--FOOTER-->
    <footer>
        <div class="footer">
            <div class="footer-box">
                <img src="assests/Navbar/logo-no-slogan.png">
                <h3>UNITOP</h3>
                <p>Educate with UNITOP!</p>
                <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true): ?>
                <a href="login.php" class="button">Log In</a>
                <?php endif; ?>
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
                    <li><a href="about-us.html">Who We Are</a></li>
                    <br>
                    <li><a href="about-us.html">Our Mission</a></li>
                    <br>
                    <li><a href="about-us.html">The Team</a></li>
                </ul>
            </div>
            <div class="footer-box">
                <h3>Useful Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <br>
                    <li><a href="contact.html">Contact Us</a></li>
                    <br>
                    <li><a href="about-us.html">About Us</a></li>
                </ul>
            </div>
        </div>
        <div class="line">
            <p>Terms and Conditions apply* | UNITOP Limited</p>
        </div>
    </footer>

</body>
</html>
