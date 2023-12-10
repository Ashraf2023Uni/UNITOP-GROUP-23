<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">

    <title>Basket</B></title>
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
                             <a href="index.php"><img src="assests/Navbar/home_4991416.png" class="home-icon"></a>
                             <a href="about-us.html"><img src="assests/Navbar/about-us.png" class="about-us-icon"></a>
                             <a href="contact-html"><img src="assests/Navbar/notification_9383540.png" class="contact-us-icon"></a>
                             <a href="index.php"><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a>
                             <a href="basket.php"><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a>
                        </div>

                        <div class="nav-links">
                        <ul>
                           <!--<li><a href="">Browse</a></li>-->
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="index.php">Account</a></li>
                            <li><a href="basket.php">Basket</a></li>
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
                require_once('connectdb.php');





                if(isset($_POST['quantity']) && isset($_POST['prod_id'])){
                    $qty = $_POST['quantity'];
                    $id = $_POST['prod_id'];

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
                
                   
                echo"<div class='cart-line'><img src='assests/Product/".$id.".png' alt='Product Image'>
                
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
    </div>";?>
       <!-- Checkout Button -->
      <form action=payments.html> <button type='submit' class="checkout-button">Proceed to Checkout</button></form>
    </div>
</div>

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