<?php


if (isset($_POST['submitted'])){

  if ( !isset($_POST['Email'], $_POST['password']) ) {


   exit('Fill in the email and password fields');
    }


  
  require_once ("connectdb.php");

  try {

    $stat = $db->prepare('SELECT password FROM signup WHERE Email = ?');

           $stat->execute(array($_POST['Email']));
      
   
       if ($stat->rowCount()>0){  

      $row=$stat->fetch();

      if (password_verify($_POST['password'], $row['password'])){ 
        
       
             session_start();

        $_SESSION["Email"]=$_POST['Email'];

        header("Location:(index.php)");

        
        exit();
      
      } else {
       echo "<p> Error logging in because your password doesn't match </p>";
         }
      } else {
     
      echo "<p> Error logging in because your email wasn't found </p>";
      }
  }
  catch(PDOException $ex) {

    echo("Failed to connect to database.<br>");
  echo($ex->getMessage());
    exit;
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" type="icon" href="assests/Banners/logo.png">
    <title>Login</title>
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
                             <a href="contact.html"><img src="assests/Navbar/notification_9383540.png" class="contact-us-icon"></a>
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
    </header>

       <div class="container">
        <div class="box f-box">
        
            <header>Login</header>
            <form action="index.php" method="post">
                <div class="input field">
                    <label for="Email">Username:</label>
                    <input type="text" name="Email" id="Email" placeholder="Email" required> 
                </div>

                <div class="input field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password" required> 
                </div>

                <div class="field">
                    
                    <input type="submit" class="button" name="submit" value="Login" required> 
                </div>
                <div class="links">
                    Dont have an account yet? <a href="register.html" >Sign Up!</a>
                </div>
            </form>
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
