<!--This page will showcase list of products that can be filtered/sorted - HUMAYRA 210005848-->
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
<form action="products-page.php" method="POST">
    <select name="sort" class="dropdown">
        <option value="default">Default</option>
        <option value="low-to-high">Price Low to High</option>
        <option value="high-to-low">Price High to Low</option>
    </select>
    <button type="submit" class="button">Order By</button>
</form>
</div>

<div class='featured-products'>
<div class="product-row" id="product-row">
    
<?php
    require('php/connectdb.php');
    
    $products = getProductsByCategory($db, $category_id);
    /*print_r($category_id);*/

    if(!empty($products)){
        foreach($products as $product){
            echo"<section class='product-card'>
                <a href='product-details.php?id=".$product['product_id']."'>
                <img src='assests/Products/".$product['product_id'].".png' alt='' id='Featured-Thumbnail'>
                <h4>".$product['product_name']."</h4>
                <p>£".$product['price']."</p>
                <button class='button'>More Details</button>
                </a>
                </section>";
        }
    }

    //To prevent duplication of products showing

    //Check if getProductsByCategory has been called
     if (!isset($products) && $products !== null){
        if($products->rowCount() > 0){
            while($product = $products->fetch()){
                echo"<section class='product-card'>
                        <a href='product-details.php?id=".$product['product_id']."'>
                        <img src='assests/Products/".$product['product_id'].".png' alt='' id='Featured-Thumbnail'>
                        <h4>".$product['product_name']."</h4>
                        <p>£".$product['price']."</p>
                        <button class='button'>More Details</button>
                        </a>
                    </section>";
            }
        } else {
            echo "Name does not exist.";
        }
     } elseif (!empty($_POST["search"])) {
        //Checks to see if there is a search input
        $name = $_POST["search"];
        /*$query = "SELECT p.product_id, p.product_name, p.price FROM products p
                    INNER JOIN product_categories pc ON p.product_id = pc.product_id;
                    INNER JOIN categories c ON pc.category_id = c.category_id WHERE p.product_name LIKE :searchName OR c.category_id LIKE :searchCategory";*/
        $query = "SELECT product_id, product_name, price FROM products WHERE product_name LIKE :searchName";
        $result = $db->prepare($query);
        $wildCard = '%' . $name . '%';
        $result->bindValue('searchName', $wildCard , PDO::PARAM_STR);
        /*$result->bindValue('searchCategory', $wildCard , PDO::PARAM_STR);*/
        $result->execute();

        if($result->rowCount() > 0){
            while($product = $result->fetch()){
                echo"<section class='product-card'>
                        <a href='product-details.php?id=".$product['product_id']."'>
                        <img src='assests/Products/".$product['product_id'].".png' alt='' id='Featured-Thumbnail'>
                        <h4>".$product['product_name']."</h4>
                        <p>£".$product['price']."</p>
                        <button class='button'>More Details</button>
                        </a>
                    </section>";
            }
        } else {
            echo "Name does not exist.";
        }
     }

    //Check if sort option has been selected
    if(!empty($_POST["sort"])) {
        $sort = $_POST["sort"];
        $sort = ($sort === 'low-to-high') ? 'ASC' : 'DESC';
        $query = "SELECT product_id, product_name, price FROM products ORDER BY price $sort";
        $result = $db->prepare($query);
        $result->execute();

        if($result->rowCount() > 0){
            while($product = $result->fetch()){
                echo"<section class='product-card'>
                        <a href='product-details.php?id=".$product['product_id']."'>
                        <img src='assests/Products/".$product['product_id'].".png' alt='' id='Featured-Thumbnail'>
                        <h4>".$product['product_name']."</h4>
                        <p>£".$product['price']."</p>
                        <button class='button'>More Details</button>
                        </a>
                    </section>";
            }
        } else {
            echo "Name does not exist.";
        }
    }

?>
</div>
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





<!--
//OLD SEARCH AND SORT PHP
/*SEARCH AND SORT FUNCTIONALITY
     $query = "SELECT product_id, product_name, price from products";
    
     //Checks if the form named 'submit' has been submitted
     if(isset($_POST["submit"])){
         //Retrieve the value entered in the form named 'search'
         $name = $_POST["search"];
         //Search for products with a name similar to what was searched
         $query = "SELECT product_id, product_name, price FROM products WHERE product_name LIKE :searchName";
         $products = $db->prepare($query);
         $products->bindValue('searchName', '%' . $name . '%', PDO::PARAM_STR);
         $products->execute();
     } else {
         //If nothing has been searched then the query still continues.
         $products = $db->prepare($query);
     }
 
     //Checks if the form with the name 'sort' has been submitted
     $sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';
     if(isset($_POST['sort'])){
         if($_POST['sort'] !== 'default'){
             switch($_POST['sort']){
                 case 'low-to-high':
                     $query .= " ORDER BY price ASC";
                     break;
                 case 'high-to-low':
                     $query .= " ORDER BY price DESC";
                     break; 
             }
         }
     }
     $products = $db->prepare($query);
     
     if(isset($_POST["submit"])){
         $name = $_POST["search"];
         $products->bindValue('searchName', '%' . $name . '%', PDO::PARAM_STR);
     }
         $products->execute();*/-->
