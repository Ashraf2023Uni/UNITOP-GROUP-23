<!--Products Deatil page for customers - Humayra Hussain, 210005848 | Noor Ahmed 220032003 | Ashraf-->
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width', initial-scale='1.0'>
    <title>UNITOP/ Products Page</title>
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

    <!--Product display with price, description, stock and buttons-->
    <div class='product-detail'>
        <div class='product-row'>
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

            //Rating of product - Humayra Hussian 210005848
                    //Fetch rating - from reviews table
                    $query = "SELECT AVG(rating) AS avg_rating FROM reviews WHERE product_id = :product_id";
                    $result = $db->prepare($query);
                    $result->bindParam(':product_id', $product_id);
                    $result->execute();
                    $average_rating = $result->fetch(PDO::FETCH_ASSOC)['avg_rating'];

                    //Display rating bar
                    echo "<div class='rating-bar'>";
                    echo "<span class='avg-rating'>Rating " . number_format($average_rating, 1) . "</span>";
                    echo "<div class='stars'>";
                    $filled_stars = floor($average_rating);
                    $half_star = $average_rating - $filled_stars;
                    $empty_star = 5 - ceil($average_rating);
                    for($i = 0; $i < $filled_stars; $i++){
                        echo "<span class='star filled'></span>";
                    }
                    if($half_star >= 5){
                        echo "<span class='star half'></span>";
                    }
                    for($i = 0; $i < $empty_star; $i++){
                        echo "<span class='star'></span>";
                    }
                    echo"</div>
                        </div> <br><br>";

            echo "<h2>£".floatval($details['price'])."</h2>";
            echo "<br>";
            
            $stock_level = $details['stock'];
            if($stock_level > 0){
                if($stock_level > 10){
                    echo "<div class='stock-indicator2'>
                                <div class='in-stock'>
                                    <p>In Shock</p>
                                </div>
                          </div>";
                    echo "<form id='addToBasket' action='basket.php' method='post'>
                            <select id='quantity' name='quantity'>
                            <option value='quantity'>Select Quantity</option>";
                    
                for($i = 1;$i<=$stock_level;$i++){
                    echo"<option>".$i."</option>";
                }
                    echo "</select>
                            <input type='hidden' name='prod_id' value='".$product_id."'>";
                    echo "<br><br>
                            <button type='submit' class='btn' name='add_basket'>Add to basket</button>
                            </form>";
                            
                    echo "<h4>Product Information</h4> <br>";
                    echo "<p>".$details['description']."</p>";

                } else {
                    echo"<div class='stock-indicator2'>
                            <div class='low-stock' id='low-stock'>
                                <p>Low in Shock</p>
                            </div>
                        </div>";
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
                    echo "<h4>Product Information</h4><br>";
                    echo "<p>".$details['description']."</p>";
                    }
                } else {
                    echo"<div class='stock-indicator2'>
                            <div class='out-stock'>
                                <p>Out of Shock</p>
                            </div>
                        </div>";
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
                    
                    echo "<h4>Product Information</h4><br>";
                    echo "<p>".$details['description']."</p>";

            }
        } else {
            echo "Product not found";
        }
    } else {
        echo "Product ID not provided";
    }
        ?>
        </div>

        <!--Reviews and ratings Humayra Hussian 210005848-->
        <div class="reviews">
            <h2>Customer Reviews</h2>
        <?php
            //Fetch reviews
            $query = "SELECT r.review_id, r.review_text, r.rating, r.review_date, c.Email, c.university
                        FROM reviews r
                        INNER JOIN customers c ON r.customer_id = c.id
                        WHERE r.product_id = :product_id";

            $result = $db->prepare($query);
            $result->bindParam(':product_id', $product_id);
            $result->execute();
            $reviews = $result->fetchAll(PDO::FETCH_ASSOC);

            //Display reviews
            if($reviews){
                foreach($reviews as $review){
                    echo"<div class='review'>";
                    echo"<p class='user'>User From " . " (" . $review['university']. ")</p>";
                    echo"<p class='rating'>Rating: " . $review['rating'] . "</p>";

                    //Fetch rating - from reviews table
                    $query = "SELECT AVG(rating) AS avg_rating FROM reviews WHERE product_id = :product_id";
                    $result = $db->prepare($query);
                    $result->bindParam(':product_id', $product_id);
                    $result->execute();
                    $average_rating = $result->fetch(PDO::FETCH_ASSOC)['avg_rating'];

                    //Display rating bar
                    echo "<div class='rating-bar'>";
                    /*echo "<span class='avg-rating'>Rating " . number_format($average_rating, 1) . "</span>";*/
                    echo "<div class='stars'>";
                    $filled_stars = floor($average_rating);
                    $half_star = $average_rating - $filled_stars;
                    $empty_star = 5 - ceil($average_rating);
                    for($i = 0; $i < $filled_stars; $i++){
                        echo "<span class='star filled'></span>";
                    }
                    if($half_star >= 5){
                        echo "<span class='star half'></span>";
                    }
                    for($i = 0; $i < $empty_star; $i++){
                        echo "<span class='star'></span>";
                    }
                    echo"</div>
                        </div>";

                    echo"<p class='review-text'> " . $review['review_text'] . "</p>";
                    echo"<p class='date'>Date: " . $review['review_date'] . "</p>";
                    echo"</div>";
                }
            } else {
                echo"<p class='no-reviews'>Be the first to review this product.</p>";
            }
        ?>
        </div>
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

    <script src="js/quantity-error.js"></script>
</body>
</html>