<?php
    session_start();

    if(isset($_SESSION['admin_email'])) {
        $admin_email = $_SESSION['admin_email'];
   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNITOP/HomePage</title>
    <link rel="stylesheet" href="css/home-page.css">
    <link rel="shortcut icon" type="icon" href="assests/Banners/logo.png">
<style>
    .logout-form {
        text-align: center;
        margin-top: 20px;
    }
    .logout-button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: white;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;    
    }
    .stock-form {
        text-align: center;
        margin-top: 20px;
    }
    .stock-button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: white;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;    
    }

    .changePw-form {
        text-align: center;
        margin-top: 20px;
    }
    .changePw-button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: white;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;    
    }
    </style>
</head>


<body>
    <header>
        <!--NAVBAR and other header stuff goes here-->
         <!--NAVBAR-->
         <div class="banner">
            <section class="navbar">
                <img src="assests/Navbar/UT-new-logo.png" width="100px" alt="UNITOP logo">

                <!--Navbar - Links to other pages-->
                <div class="links">
                    <nav>
                        <div class="img-links">
                             
                             <a href="about-us.html"><img src="assests/Navbar/about-us.png" class="about-us-icon"></a>
                             <a href="contact.html"><img src="assests/Navbar/notification_9383540.png" class="contact-us-icon"></a>
                             <a href="admin_index.php"><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a>
                             <a href="basket.php"><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a>
                             
                        </div>
                        <div class="nav-links">
                            <ul>
                               
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="admin_index.php">Account</a></li>
                                <li><a href="basket.php">Basket</a></li>
                                
                            </ul>
                        </div>
                        <div class="search-bar">
                            <input type="search" id="search" placeholder="What are you looking for?">
                            <button type="submit"><img src="assests/Navbar/search.png" class="search-icon"></button>
                            </div>
                    </nav>

                </div>
            </section>
        </div>

        
    </header>

    <!------------------------------MAIN BODY--------------------------------------->
    <div class="container">
        <h1>Welcome, <?php echo $admin_email; ?></h1>
        <form action="admin_logout.php" method="post" class="logout-form">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>

    <div class="container2">
        
        <form action="update_stock.php" method="post" class="stock-form">
            <button type="submit" class="stock-button">Adjust Stock</button>
        </form>
    </div>

    <div class="container3">
        
        <form action="admin_pw_change.php" method="post" class="changePw-form">
            <button type="submit" class="changePw-button">Change your password</button>
        </form>
    </div>

    <div class="container3">
        
        <form action="admin_change_customers.php" method="post" class="changePw-form">
            <button type="submit" class="changePw-button">Customer Management</button>
        </form>
    </div>

    <footer> 
    <div class="footer">
    <div class="footer-box">
        <img src="assests/Navbar/logo-no-slogan.png">
        <h3>UNITOP</h3>
        <p>Educate with UNITOP!</p>
       
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
   
             
