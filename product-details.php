<!--Products Deatil page for customers - Humayra Hussain, 210005848 | Noor Ahmed 220032003 | Ashraf-->
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width', initial-scale='1.0'>
    <title>Products Page</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet"
    />
    <link rel='stylesheet' href='css/home-page.css'>
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
                        <a href="about-us.html"><img src="assests/Navbar/about-us.png" class="about-us-icon"></a>
                        <a href="contact.html"><img src="assests/Navbar/notification_9383540.png" class="contact-us-icon"></a>
                        <a href="index.php"><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a>
                        <a href="basket.php"><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a>
                        <a href="admin_login.php"><img src="assests/Navbar/staffpic.png" class="staff-icon"></a>
                    </div>
                    <div class="page-links">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="index.php">Account</a></li>
                            <li><a href="basket.php">Basket</a></li>
                            <li><a href="admin_login.php">Staff login</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--Menu with the categories based on degrees of students-->
    <div class="menu">
    <a href="products-page.php">Computer Science</a>
    <a href="products-page.php">Biology</a>
    <a href="products-page.php">Graphics Design</a>
    <a href="products-page.php">Law</a>
    <a href="products-page.php">Medicine</a>
    </div>

    <!--Product display with price, description, stock and buttons-->
    <div class='product-detail'>
        <section class='product-row'>
            <?php 
            require_once('php/connectdb.php');

            //Error message when no quantity is selected
            $quantity = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $quantity = $_POST['quantity'];
            }
            if (isset($_GET['error'])): ?>
                <div class="error-message"style="color: red;">>
                <?php
                switch ($_GET['error']) {
                    case 'select quantity':
                        echo "Please select a quantity.";
                        break;
                }
                ?>
            </div>
            <?php endif;
        
            $product_id = "";
            if(ISSET($_GET["id"])){
                $product_id = $_GET["id"];
            $query = "SELECT * FROM products WHERE product_id = $product_id";
            $details = $db->query($query)->fetch();
            
            if($details){
                echo"<section class='gallery'>";
                echo "<img src='assests/Products/".$details['product_id'].".png' id='main-image'>";
                echo "<div class='small-gallery'>";
                    echo  "<img src='assets/Products/".$details['product_id'].".png'>";

                    for($i=1; $i<=4; $i++){
                        if(file_exists('assests/Products/'.$details['product_id'].'_'.$i.'.png')){
                        echo"<img src='assests/Products/".$details['product_id']."_".$i.".png'>";
                    }
                }
                echo "</div>";
            echo "</section>";
            
            echo "<section class='details'>";
            echo "<a href='products-page.php'>Home/ All Laptops</a>";
            echo "<br><br>";
            echo "<h3>".$details['product_name']."</h3>";
            echo "<br>";
            echo "<h2>£".floatval($details['price'])."</h2>";
            echo "<br>";
            
            $stock_level = $details['stock'];
            if($stock_level > 0){
                if($stock_level > 10){
                    echo "<p>Status: In Shock</p>";
                    echo "<form id='addToBasket' action='basket.php' method='post'>";
                    echo "<select id='quantity' name='quantity'>";
                    echo "<option value='quantity'>Select Quantity</option>";
                    for($i = 1;$i<=$stock_level;$i++){
                            echo"<option>".$i."</option>";
                    }
                    echo "</select>";
                    echo "<input type='hidden' name='prod_id' value='".$product_id."'>";
                    echo "<br><br>";
                    echo "<button type='submit' class='btn' name='add_basket'>Add to basket</button>";
                    echo "</form>";
                    echo "<p>".$details['description']."</p>";
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

   <!--FOOTER-->
   <footer>
        <div class="footer">
            <div class="footer-box">
                <img src="assests/Navbar/logo-no-slogan.png">
                <h3>UNITOP</h3>
                <p>Educate with UNITOP!</p>
                <a href="login.php" class="button">Log In</a>
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
    <script src="quantity-error.js"></script>
</body>
</html>