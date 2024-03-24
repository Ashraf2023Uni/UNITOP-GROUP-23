<!--Mohammed Sabil Ali Student ID: 220192905-->

<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    
    header('Location: login.php');
    exit;
}

include_once("php/connectdb.php");


$user_id = $_SESSION['user_id'];

// Initialize variables for password change
$change_password_success = false;
$password_change_error = '';

// Query the database for the user's account information
try {
    $stmt = $db->prepare("SELECT * FROM customers WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
        
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];
        
        // Fetch the current password hash from the database
        if (password_verify($current_password, $user['password'])) {
            // Check if new password and confirm new password match
            if ($new_password === $confirm_new_password) {
                // Update the password in the database
                $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $update_stmt = $db->prepare("UPDATE customers SET password = ? WHERE id = ?");
                if ($update_stmt->execute([$new_password_hash, $user_id])) {
                    $change_password_success = true;
                } else {
                    $password_change_error = 'An error occurred while updating your password. Please try again.';
                }
            } else {
                $password_change_error = 'New passwords do not match.';
            }
        } else {
            $password_change_error = 'Current password is incorrect.';
        }
    }
} catch (PDOException $e) {
    // database errors
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNITOP/ Your Account</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/accounts.css">
    <link rel="shortcut icon" type="icon" href="assets/Banners/logo.png">
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

<div class="account-container">
    <aside class="sidebar">
        <div class="sidebar-header">
            <h3><a href="accounts.php">Your Account</a></h3>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#" id="showInfoBtn">Your Profile</a></li>
            <li><a href="#" id="showOrdersBtn">View Your Orders</a></li>
            <li><a href="#" id="showPasswordBtn">Change Password</a></li>
        </ul>
    </aside>
    <div class="profile-content">
        <div id="profile" class="section">
            <h2>Your Profile</h2>
            <?php if ($user): ?>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['Email']); ?></p>
                <p><strong>University:</strong> <?php echo htmlspecialchars($user['university']); ?></p>
                <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['phoneNumber']); ?></p>
            <?php else: ?>
                <p>Account details not found.</p>
            <?php endif; ?>
        </div>
        <div id="orders" class="section">
                <h2><bold>Your Orders</bold></h2>
                <div id="order-display">
                    <?php
                    $orderQuery = "SELECT * FROM orders WHERE user_id = ?";
                    $orderResult = $db->prepare($orderQuery);
                    $orderResult->execute([$_SESSION['user_id']]);

                    while($order = $orderResult->fetch(PDO::FETCH_ASSOC)){
                        $orderlineQuery = "SELECT * FROM orderlines WHERE order_id = ?";
                        $orderlineResult = $db->prepare($orderlineQuery);
                        $orderlineResult->execute([$order['order_id']]);

                        echo"<div class='all-info'>";
                        echo"<div class='order-box'>
                                <div class='date-header'><h3>Ordered on: " . substr($order['order_date'],0,10) . "</h3></div>";
                        while($orderline = $orderlineResult->fetch(PDO::FETCH_ASSOC)){
                            echo "<div class='info'><img src='assests/Products/".$orderline['product_id'].".png' class='product-img'>";
                            $productQuery = "SELECT product_name FROM products WHERE product_id = ?";
                            $productResult = $db->prepare($productQuery);
                            $productResult->execute([$orderline['product_id']]);
                            $productName = $productResult->fetch();
                            echo "<p>".$productName['product_name']."<br>Qty: ".$orderline['quantity']."</p></div>
                                  <form method='post' action='write-review.php?id=".$orderline['product_id']."'><button class='review-btn' type='submit'> LEAVE A REVIEW </button></form>";

                        }
                        echo   "<p class='price-txt'><strong>Total Price:</strong> £" . $order['cost'] . " </p>
                                <p class='status'>Delivery status: ".$order['status']."</p>";
                                if($order['status'] == "completed"){
                                    echo "<form action='return-form.php' method='post'>
                                    <input type='hidden' name='id' value='".$order['order_id']."'>
                                    <button class='returnBtn' id='id'>Return Items</button>
                                    </form>";
                                }
                        echo "</div> </div>";
                    }
                    
                    ?>
                </div>
        </div>
        <div id="changePassword" class="section">
            <h2>Change Password</h2>
            <?php if ($change_password_success): ?>
                <p class="success">Password successfully updated.</p>
            <?php endif; ?>
            <?php if ($password_change_error): ?>
                <p class="error"><?php echo htmlspecialchars($password_change_error); ?></p>
            <?php endif; ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" name="current_password" id="current_password" required>
                </div>
                <div class="form-group">
                <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" id="new_password" pattern="(?=.*\d)(?=.*[A-Z]).{8,}"
                    title="Password must be at least 8 characters long and contain at least one uppercase letter and one number." required>
                </div>
                <div class="form-group">
                    <label for="confirm_new_password">Confirm New Password:</label>
                    <input type="password" name="confirm_new_password" id="confirm_new_password" required>
                </div>
                <div class="form-group">
                <button type="submit" name="change_password">Change Password</button>
                </div>
            </form>
        </div>
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

<script src="js/accounts.js"></script>

</body>
</html>

