<!--This page will showcase list of products that can be filtered/sorted -->
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>UNITOP/Products</title>
     <!--Google Fonts-->
     <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/home-page.css">
    <link rel="shortcut icon" type="icon" href="assests/Banners/logo.png">
    <script src="script.js" defer></script>
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

<!------------------------------SORTING PRODUCTS-------------------------------------->
<div class="sorting">
<form action="products-page.php<?php echo isset($_GET['category']) ? '?category=' . htmlspecialchars($_GET['category']) : ''; ?>" method="POST">
    <select name="sort" class="dropdown">
        <option value="default">Default</option>
        <option value="low-to-high">Price Low to High</option>
        <option value="high-to-low">Price High to Low</option>
    </select>
    <button type="submit" class="button">Order By</button>
</form>
</div>

<div class="featured-products">
    <div class="product-row" id="product-row">
        <?php
            require('php/connectdb.php');

            //Check to see if there is a search input
            if (!empty($_POST["search"])) {
                $productName = $_POST["search"];
                $query = "SELECT product_id, product_name, stock, price FROM products WHERE product_name LIKE :searchInput";
                $result = $db->prepare($query);
                $wildCard = '%' . $productName . '%';
                $result->bindValue('searchInput', $wildCard, PDO::PARAM_STR);
                $result->execute();

                //Display products
                if($result->rowCount() > 0) {
                    while($product = $result->fetch()){
                        echo"<section class='product-card'>
                                <div class='stock-indicator'>";
                                    $stock_level = $product['stock'];
                                    if($stock_level = 0){
                                        if($stock_level > 10){
                                            echo"<div class='in-stock'><p>In Stock</p></div>";
                                        } else {
                                            echo"<div class='low-stock'><p>Low in Stock</p></div>";
                                        }
                                    } else {
                                        echo"<div class='out-stock'><p>Out of Stock</p></div>";
                                    }
                                echo"</div>
                                <a href='product-details.php?id=".$product['product_id']."'>
                                <img src='assests/Products/".$product['product_id'].".png' alt='' id='Featured-Thumbnail'>
                                <h4>".$product['product_name']."</h4>
                                <p>£".$product['price']."</p>
                                <button class='button'>More Details</button> </a>
                            </section>";
                    }
                } else {
                    echo "<div class='error-message'> 
                            We couldn't find any products matching your search. 
                            <br>
                            Please try again with a different keyword or browse our current categories to find what 
                            you're looking for. 
                          </div>";
                }
            } else {
                //Display products that have been filtered by the category or sorted
                if(!empty($products)){
                    foreach($products as $product){
                        echo"<section class='product-card'>
                                <div class='stock-indicator'>";
                                    $stock_level = $product['stock'];
                                    if($stock_level > 0){
                                        if($stock_level > 10){
                                            echo"<div class='in-stock'><p>In Stock</p></div>";
                                        } else {
                                            echo"<div class='low-stock'><p>Low in Stock</p></div>";
                                        }
                                    } else {
                                        echo"<div class='out-stock'><p>Out of Stock</p></div>";
                                    }
                                echo"</div>
                                <a href='product-details.php?id=" . htmlspecialchars($product['product_id']) . "'>
                                <img src='assests/Products/" . htmlspecialchars($product['product_id']) . ".png' alt='' id='Featured-Thumbnail'>
                                <h4>" . htmlspecialchars($product['product_name']) . "</h4>
                                <p>£" . htmlspecialchars($product['price']) . "</p>
                                <button class='button'>More Details</button>
                                </a>
                            </section>";
                    }
                }
            }
        ?>
    </div>
</div>

<!-------------------FOOTER---------------------->

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
                    <li><a href="contact.php">Contact Us</a></li>
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