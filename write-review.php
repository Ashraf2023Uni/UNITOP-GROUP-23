<?php

//user sent to homepage if accessing this page invalidly
if(!(ISSET($_GET['id']))){
    header('Location: index.php');
}
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
    <link rel="stylesheet" href="css/write-review.css"/>
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
    </header>

    <div id="review-body">
        <?php
        require_once('php/connectdb.php');
        $query = "SELECT product_name FROM products WHERE product_id = ?";
        $execute = $db->prepare($query);
        $execute->execute([$_GET['id']]);
        $product = $execute->fetch();


        echo "<form action='temporary.php?id=".$_GET['id']."' method='POST'>"; //Replace temporary.php when not needed
            echo "<h2>".$product['product_name']."</h2>";
            echo "<img src='assests/Products/" . $_GET['id'] . ".png'>"; ?>
            
            <!--Star rating with radio buttons-->
            <div class='star-wrapper'>
                <div class='star-rating'>
                    <input type='radio' name='rating' id='rating1' value='5'><label for='rating1'></label>
                    <input type='radio' name='rating' id='rating2' value='4'><label for='rating2'></label>
                    <input type='radio' name='rating' id='rating3' value='3'><label for='rating3'></label>
                    <input type='radio' name='rating' id='rating4' value='2'><label for='rating4'></label>
                    <input type='radio' name='rating' id='rating5' value='1'><label for='rating5'></label>
                </div>
            </div>


            <!--User's written review-->
            <div class='textarea'>
                <label for='review-text'>Your review:</label>
                <textarea name='review-text' id='review-text' placeholder='My review is...' required></textarea>
            </div>
            <button type='submit'>Submit review</button>

        </form>
    </div>
</body>

