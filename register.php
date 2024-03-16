<!--Mohammed Sabil Ali Student ID: 220192905-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" type="icon" href="assests/Banners/logo.png">
    <title>Register</title>
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
    $university = isset($_POST['university']) ? $_POST['university'] : false;
    $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : false;

    // Email domain validation
    if (!preg_match("/^.+@.+\.ac\.uk$/i", $email)) {
        header("Location: register.php?error=email_domain_invalid");
        exit;
    }

    // Password criteria validation
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
        header("Location: register.php?error=password_criteria_not_met");
        exit;
    }

    // Check if passwords match 
    // FIXED ORDER AS WAS OVERWRITTEN BEFORE
    if($password !== $confirmPassword) {
        // Redirect back to registration page with error message
        header("Location: register.php?error=password_mismatch");
        exit; // Stop
    }

    // Check if all fields are provided
    if(!$email || !$university || !$phoneNumber || !$password || !$confirmPassword) {
        // Redirect back to registration page with error message
        header("Location: register.php?error=invalid_data");
        exit; // Stop
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Checks if email or phone number already exists in the database
        $stmt = $db->prepare("SELECT * FROM customers WHERE Email = ? OR phoneNumber = ?");
        $stmt->execute(array($email, $phoneNumber));
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if($existingUser) {
            // If email or phone number already exists show error
            header("Location: register.php?error=duplicate_entry");
            exit;
        }

        // Insert data to database
        $stmt = $db->prepare("INSERT INTO customers (Email, university, password, phoneNumber) VALUES (?, ?, ?, ?)");
        $stmt->execute(array($email, $university, $hashedPassword, $phoneNumber));

        header("Location: login.php");
        exit;
    } catch (PDOException $ex) {
        echo "A database error has occurred.<br>";
        echo "Error details: <em>" . $ex->getMessage() . "</em>";
    }
}
?>
            
            <!-- Display Error Messages -->
            <?php if (isset($_GET['error'])): ?>
                <div class="error-message"style="color: red;">>
                    <?php
                    switch ($_GET['error']) {
                        case 'email_domain_invalid':
                            echo "Email must end with .ac.uk. Please use a valid academic email address.";
                            break;
                        case 'password_criteria_not_met':
                            echo "Password must be at least 8 characters long, include at least one uppercase letter and one number.";
                            break;
                        case 'password_mismatch':
                            echo "Passwords do not match!";
                            break;
                        case 'invalid_data':
                            echo "Please ensure all fields are filled out correctly.";
                            break;
                        case 'duplicate_entry':
                            echo "The email or phone number is already in use. Please try again.";
                            break;
                        // ADD other error messages as needed
                    }
                    ?>
                </div>
            <?php endif; ?>

    
            <header>Sign Up</header>
            <form id="registrationForm" action="register.php" method="post">
                
                <div class="input field">
                    <label for="Email">Email:</label>
                    <input type="email" name="Email" id="Email" placeholder="Email" pattern=".+@.+\.ac\.uk$" title="Email must end with .ac.uk" required> 
                </div>

                <div class="input field">
                    <label for="university">University:</label>
                    <input list="universities" name="university" id="universityInput" placeholder="Type or select your university" required>
                    <datalist id="universities"></datalist>
                </div>

                <div class="input field">
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" pattern="[0-9]*" maxlength="11"  required> 
                </div>

                <div class="input field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[A-Z]).{8,}" 
       title="Password must be at least 8 characters long and contain at least one uppercase letter and one number." required> 
                </div>

                <div class="input field">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required oninput="validatePassword()">
                    <span id="passwordError" style="color: red;"></span>
                    <span id="passwordMatch" style="color: green;"></span>
                </div>

                <div class="field">
                    
                    <input type="submit" class="button" name="submit" value="Register" required> 
                </div>
                <div class="links">
                    Already have an account? <a href="login.php">Sign In!</a>
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

    <script src="js/register.js"></script>

</body>
</html>
