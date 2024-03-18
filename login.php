<!--Mohammed Sabil Ali Student ID: 220192905-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
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
                             <a href=""><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a>
                             <a href="basket.php"><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a>
                        </div>

                        <div class="nav-links">
                        <ul>
                           <!--<li><a href="">Browse</a></li>-->
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="">Account</a></li>
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
        
        <?php
include_once("php/connectdb.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_host = 'localhost';
$db_name = 'unitop';
$username = 'root';
$password = '';

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password);

if(isset($_POST['submit'])) {
    $email = isset($_POST['Email']) ? $_POST['Email'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;

    if(!$email || !$password) {
        exit("Invalid data");
    }

    try {
        $stmt = $db->prepare("SELECT * FROM customers WHERE Email = ?");
        $stmt->execute(array($email));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login successful, redirect to a logged-in page or perform necessary actions
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['Email']; // Store the user's email in the session
            $_SESSION['logged_in'] = true;
            header("Location: index.php");
            exit;
        } else {
            // Login failed, display an error message or redirect to login page
            echo "Invalid username or password";
        }
    } catch (PDOException $ex) {
        echo "A database error has occurred.<br>";
        echo "Error details: <em>" . $ex->getMessage() . "</em>";
    }
}
?>
            <header>Login</header>
            <form action="login.php" method="post">
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
                    Don't have an account yet? <a href="register.php" >Sign Up!</a>
                </div>
            </form>
            </div>

       </div>

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
