<!--This page will showcase list of products that can be filtered/sorted-->
<?php 
  session_start();
    require('php/connectdb.php');

    //Fetch data from database
    $query = "SELECT product_id, product_name, price FROM products";
    $result = $db->query($query);
    $products = $result->fetchAll(PDO::FETCH_ASSOC);
    
    //Function - sorts product based on selection value        
    function sortProducts($products, $sort){
        switch($sort){
            case 'high-to-low':
                usort($products, function($low, $high){
                    return $high['price'] - $low['price'];
                });
                break;
            case 'low-to-high':
                usort($products, function($low, $high){
                    return $low['price'] - $high['price'];
                });
                break;
            default;
                break;
        }
        return $products;
    }
    //Get the selection value form user
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';
    if($sort === 'default'){
        $sorted = $products;
    } else {
        //Sort product
        $sorted = sortProducts($products, $sort);
    }  
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
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

<!-----------------Main Body-------------------->
<div class="sorting">
    <span>Sort: </span>
    <select name="sort" id="select" onchange="sortProducts()">
        <option value="default">Default</option>
        <option value="low-to-high">Low to High</option>
        <option value="high-to-low">High to Low</option>
</div>

<div id="prod">
    <section class="row">
        <!--Product Details-->
        <div class="featured-img">
        <?php
        require('php/connectdb.php');
        if($result){
                foreach ($sorted as $product){
                echo"
                <section class='products'>
                <a href='product-details.php?id=".$laptop['product_id']."'>
                    <img src='assests/Product/".$laptop['product_id'].".png' alt='' id='Featured-Thumbnail'>
                    <h4>".$laptop['product_name']."</h4>
                    <p>£".$laptop['price']."</p>
                    <button class='button'>More Details</button>
                </a>
                </section>";
                }
            } else {
            echo "Product not found";
            }
        ?>
        </div>
    <section>
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