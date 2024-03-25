<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database connection parameters
$host = 'localhost';  // Your database host
$user = 'root';       // Your database username, 'root' is default for localhost
$pass = '';           // Your database password, empty by default for localhost
$db = 'unitop';       // Your database name

// Establish a new database connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $subject = $mysqli->real_escape_string($_POST['subject']);
    $message = $mysqli->real_escape_string($_POST['message']);

    // SQL query to insert form data into the 'contact' table
    $query = "INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)";

    // Prepare and bind
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Thank you for your message! We will get back to you soon.');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "<script>alert('Prepare failed: " . $mysqli->error . "');</script>";
    }
}

// Close connection
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - uniTOP</title>
    <link rel="stylesheet" href="css/contacts.css">
    <link rel="stylesheet" href="css/home-page.css">
</head>
<body>

<header>
    <!--NAVBAR-->
    <div class="navbar">
        <img src="assests/Navbar/UT-new-logo.png" width="100px" alt="UNITOP logo">
        <!--Search bar - products to be searched through by name-->
        <?php include('php/search.php'); ?>

        <!--NAVIGATION BAR-->
        <div class="links">
            <nav>
                <div class="img-links">
                    <a href="index.php"><img src="assests/Navbar/home_4991416.png" class="home-icon"></a>
                    <a href="about-us.php"><img src="assests/Navbar/about-us.png" class="about-us-icon"></a>
                    <a href="contact.php"><img src="assests/Navbar/notification_9383540.png" class="contact-us-icon"></a>
                    <a href="index.php"><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a>
                    <a href="basket.php"><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a>
                    <a href="admin_login.php"><img src="assests/Navbar/staffpic.png" class="staff-icon"></a>
                </div>
                <div class="page-links">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="index.php">Account</a></li>
                        <li><a href="basket.php">Basket</a></li>
                        <li><a href="admin_login.php">Staff login</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<div class="container contact-page">
    <h1>Contact Us</h1>
    <p class="contact-intro">If you have any questions, please fill out the form below and we will get back to you as soon as possible.</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="contact-form">
        <div class="form-group">
            <label for="name">Name
           <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your email" required>
        </div>

        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Subject" required>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Write something.." required></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Submit" class="submit-button">
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function validateForm() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var subject = document.getElementById('subject').value;
        var message = document.getElementById('message').value;
        if (name == "" || email == "" || subject == "" || message == "") {
            alert("All fields must be filled out");
            return false;
        }
        return true;
    }

    document.querySelector('.contact-form').addEventListener('submit', function(e) {
        if (!validateForm()) {
            e.preventDefault();
        }
    });
});
</script>

</body>
  <!-- Footer -->
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
                    <li><a href="">Our Mission</a></li>
                    <li><a href="">The Team</a></li>
                </ul>
            </div>

            <div class="footer-box">
                <h3>Useful Links</h3>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">About Us</a></li>
                </ul>
            </div>
        </div>
        <div class="line">
            <p>Terms and Conditions apply* | UNITOP Limited</p>
        </div>
    </footer>
    <!-- End of Footer -->
</body>


</html>
