<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/home-page.css"> <!-- Humayras style sheet -->
        <title> Admin Logout </title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .logout-message {
                text-align: center;
            }
        </style>
</head>
<body>
        <div class="banner">
            <section class="navbar">
                <img src="assests/Navbar/UT-new-logo.png" width="100px" alt="UNITOP logo">

                <!--Navbar - Links to other pages-->
                <div class="links">
                    <nav>
                        <div class="img-links">
                             
                             <a href="about-us.html"><img src="assests/Navbar/about-us.png" class="about-us-icon"></a>
                             <a href="contact.html"><img src="assests/Navbar/notification_9383540.png" class="contact-us-icon"></a>
                             
                        </div>
                        <div class="nav-links">
                            <ul>
                               
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact.html">Contact Us</a></li>                                
                            </ul>
                        </div>
                        <br>
                        <br>


   <div class="logout-message">
            <h3>Admin Has Signed Out</h3>
            <br>
            <br>
            <?php
session_start();

$_SESSION = array();

session_destroy();

echo "You have logged out";

echo "<br>Go back home? <a href='index.php'>home page</a>";
?>
</div>
            
           
</body>
</html>                
