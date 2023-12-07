<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">

    <title>Products Page</title>
    <link rel="stylesheet" href="css/home-page.css">
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
                             <a href=""><img src="assests/Navbar/home_4991416.png" class="home-icon"></a>
                             <a href=""><img src="assests/Navbar/about-us.png" class="about-us-icon"></a>
                             <a href=""><img src="assests/Navbar/notification_9383540.png" class="contact-us-icon"></a>
                             <a href=""><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a>
                             <a href=""><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a>
                        </div>

                        <div class="nav-links">
                        <ul>
                           <!--<li><a href="">Browse</a></li>-->
                            <li><a href="">Home</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Account</a></li>
                            <li><a href="">Basket</a></li>
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

    <div class="product">
        <section class="row">
            <section class="gallery">
            <img src="assests/E-sports/LegionPro7left.avif">
            <div class="small-gallery">
                <img src="assests/E-sports/LegionPro7right.avif">
                <img src="assests/E-sports/LegionPro7top.avif">
                <img src="assests/E-sports/LegionPro7back.avif">
                <img src="assests/E-sports/LegionPro7top.avif">
            </div>
            </section>
            <section class="details">
            <!--Link back to home page-->
            <a href="">Home</a>
            <br><br>
            <h3>Lenovo Legion Pro 7 Gen 8 (16" AMD)</h3>
            <br>
            <h2>£2,549.99</h2>
            <br>
            <select name="quantity">
                <option>select quantity</option>
                <option>100</option>
                <option>1000</option>
                <button class="button"> Add to Basket </button>
            </select>
            <br><br>
            <button class="btn">Add to basket</button>
            <br><br>
            <h4>More Details:</h4>
            <br>
            <p> Powerful AI-tuned gaming laptop with AMD Ryzen™ processing muscle.
                <br>
                Stunning 16″ Lenovo PureSight Gaming Display with WQXGA resolution.
                <br>
                Best-in-class thermal technology & real-time system optimization.
                <br>
                Huge 99.99Whr battery with Super Rapid Charge.
                <br>
                Customizable per-key RGB keyboard & swappable key caps.
                <br>
                Recycled aluminum & organic polymers make for more sustainable gaming.
                <br>
                Play over 100 high-quality PC games with your new Legion PC.
                </p>
        
            </section>
        </section>
    </div>

    <!--Product Details Body - JavaScript needed to be able to select any product and go to product detail page-->


<!-------------------FOOTER---------------------->
<footer>
    <div class="footer">
        <div class="footer-box">
            <img src="assests/Navbar/logo-no-slogan.png">
            <h3>UNITOP</h3>
            <p>Educate with UNITOP!</p>
            <button class="btn">Log In</button>
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
                <li><a href="">Account</a></li>
            </ul>
        </div>
    </div>
    <div class="line">
          <p>Terms and Conditions apply* | UNTIP Limited</p>
    </div>
    
    </footer>    
    
</body>
</html>