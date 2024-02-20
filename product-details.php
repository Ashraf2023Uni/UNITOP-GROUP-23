<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width', initial-scale='1.0'>

    <title>Products Page</title>
    <link rel='stylesheet' href='css/home-page.css'>
</head>

<body>

    <header>
        <!--NAVBAR-->
        <div class='banner'>
            <section class='navbar'>
                <img src='assests/Navbar/logo-no-slogan.png' width='75px' alt='UNITOP logo'>
                <h1>UNITOP</h1>
                <div class='links'>
                    <nav>
                        <div class='img-links'>
                             <!--Customer basket-->
                             <!--<a href=''><img src='images/search.png' class='browse-icon'></a>-->
                             <a href='index.php'><img src='assests/Navbar/home_4991416.png' class='home-icon'></a>
                             <a href='about-us.html'><img src='assests/Navbar/about-us.png' class='about-us-icon'></a>
                             <a href='contact.html'><img src='assests/Navbar/notification_9383540.png' class='contact-us-icon'></a>
                             <a href=''><img src='assests/Navbar/avatar_9892372.png' class='account-icon'></a>
                             <a href='basket.php'><img src='assests/Navbar/checkout_4765148.png' class='basket-icon'></a>
                        </div>

                        <div class='nav-links'>
                        <ul>
                           <!--<li><a href=''>Browse</a></li>-->
                            <li><a href='index.php'>Home</a></li>
                            <li><a href='about-us.html'>About Us</a></li>
                            <li><a href='contact.php'>Contact Us</a></li>
                            <li><a href=''>Account</a></li>
                            <li><a href='basket.php'>Basket</a></li>
                        </ul>
                        </div>
                    
                        <!---Search Bar--->
                        <div class='search-bar'>
                            <input type='text' placeholder='Search'>
                            <button type='submit'><img src='assests/Navbar/search.png' class='search-icon'></button>
                        </div>
                    </nav>

                   </div>
            </section>
        </div>

          <!--Menu with the categories - each subject-->
        <div class='menu'>
            <a href=''>Computer Science</a>
            <a href=''> E-sports</a>
            <a href=''>Graphics Design</a>
            <a href=''>Law</a>
            <a href=''>Medicine</a>
        </div>
    </header>

    <div class='product'>
        <section class='row'>
            <?php 
            require_once('php/connectdb.php');

            $product_id = "";
            if(ISSET($_GET["id"])){
                $product_id = $_GET["id"];
            
            $query = "SELECT * FROM products WHERE product_id = $product_id";
            #Ashraf work
            $details = $db->query($query)->fetch();
            if($details){
                echo"<section class='gallery'>";
                echo "<img src='assests/Product/".$details['product_id'].".png' id='main-image'>";
                echo "<div class='small-gallery'>";
                echo  "<img src='assets/Product/".$details['product_id'].".png'>";

                    for($i=2; $i<=7; $i++){
                        if(file_exists('assests/Product/'.$details['product_id'].'_'.$i.'.png')){
                        echo"<img src='assests/Product/".$details['product_id']."_".$i.".png'>";

                    }
                }
                echo "</div>";
            echo "</section>";
            
            echo "<section class='details'>";
            echo "<!--Link back to home page-->";
            echo "<a href='index.php'>Home</a>";
            echo "<br><br>";
            echo "<h3>".$details['product_name']."</h3>";
            echo "<br>";
            echo "<h2>£".floatval($details['price'])."</h2>";
            echo "<br>";
            $stock_level = $details['stock'];
            if($stock_level > 0){
                if($stock_level > 10){
                    echo "<p>Status: In Shock</p>";
                    echo "<form action='basket.php' method='post'>";
                    echo "<select name='quantity'>";
                    echo "<option>select quantity</option>";
                    for($i = 1;$i<=$stock_level;$i++){
                            echo"<option>".$i."</option>";
                    }
                    echo "</select>";
                    echo "<input type='hidden' name='prod_id' value='".$product_id."'>";
                    echo "<br><br>";
                    echo "<button type='submit' class='btn' name='add_basket'>Add to basket</button>";
                    echo "</form>";
                } else {
                    echo"<p>Status: Low Stock</p>";
                    }
                } else {
                    echo"<p>Status: Out of stock </p>";

            }
        } else {
            echo "Product not found";
        }
    } else {
        echo "Product ID not provided";
    }
        ?>
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
            <a href="login.php" class="btn">Log In</a>
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
