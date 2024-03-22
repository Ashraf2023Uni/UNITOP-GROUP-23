<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">

    <title>Basket</B></title>
    <link rel="stylesheet" href="css/home-page.css">
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
                        <ul>
                            <li><a href="index.php"><img src="assests/Navbar/home_4991416.png" class="home-icon"></a></li>
                            <li><a href="index.php"><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a></li>
                            <li><a href="basket.php"><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a></li>
                            <li><a href="admin_pin.php"><img src="assests/Navbar/staffpic.png" class="staff-icon"></a></li>
                        </ul>
                    </div>
                    <div class="page-links">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php">Account</a></li>
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

   <!----cart item details--------->
   <div class="small-container cart-page">
    <table>
        <tr>
            <th>Products</th>
        
        </tr>
        <tr>
            <td class="cart-info" >
<?php 
                session_start();
                require_once('php/connectdb.php');





                if(isset($_POST['quantity']) && isset($_POST['prod_id'])){
                    $qty = $_POST['quantity'];
                    $id = $_POST['prod_id'];

                }
                elseif(! isset($_SESSION['prod_id']) || empty($_SESSION['prod_id'])) {
                    header('Location: empty-basket.php');
                }
                if(isset($_POST['add_basket'])){
                    

                    if(isset($_SESSION['prod_id'])){
                        $_SESSION['prod_id'][] = $id; 
                    } 
                    else{
                        $_SESSION['prod_id'] = array();
                        $_SESSION['prod_id'][] = $id;
                    }

                    if(isset($_SESSION['qty'])){
                        $_SESSION['qty'][] = $qty; 
                    } 
                    else{
                        $_SESSION['qty'] = array();
                        $_SESSION['qty'][] = $qty; 
                    }
                }
                $total = 0;
                $split_total = array();
                for($i = 0; $i<count($_SESSION['prod_id']); $i++){
                    $id = $_SESSION['prod_id'][$i];
                    $quantity = $_SESSION['qty'][$i];
                    $query = "SELECT product_name, price FROM products WHERE product_id = $id";
                    $laptop = $db->query($query)->fetch();
                    $total = $total + (floatval($laptop['price']) * intval($quantity));
                    $split_total[$i] = (floatval($laptop['price']) * intval($quantity));
                
                   
                echo"<div class='cart-line'><img src='assests/Products/".$id.".png' alt='Product Image'>
                
                    <div>
                        <p>".$laptop['product_name']."</p>
                        <small>Price: £".$laptop['price']."</small><br>
                        <small>Qty: $quantity
                        <br>
                        <p> Subtotal: £$split_total[$i] </p>

                    </div>
                </div>";}   
        echo"</tr> </td>
    </table>
    <div class='total-price'>
        <table>
            <tr>
                <td>Subtotal</td>
                <td>£$total</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>£0</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>£$total</td>
            </tr>
        </table>
    </div>";

    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
        echo"<form action= HTML-files/payments.html> <button type='submit' class='checkout-button'>Proceed to Checkout</button></form>";
    }
    else{
        echo"<form action= login.php> <button type='submit' class='checkout-button'>Login to Checkout</button></form>";   
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
    
</body>
</html>