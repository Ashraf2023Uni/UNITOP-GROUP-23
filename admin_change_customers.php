<?php

session_start();


    require_once('php/connectdb.php');

if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>UNITOP/Admin Customer Management</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/home-page.css"/>
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
    </header>

    <!------------------------------MAIN BODY--------------------------------------->
     <!--Back button - to go back to dashboard-->
     <div class="admin-menu">
     <a href="admin_index.php">Admin/Dashboard</a>
    </div>

        <div class="container">
            <h1>Customer Management</h1>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>University</th>
                        <th>Phone Number</th>
                    </tr>
                    </thead>
                    <tbody>
       
<?php

//view customers
$query = "SELECT * FROM customers";
$result = $db->query($query);
if ($result) {
    echo "<table>";
   // echo "<thead><tr><th>ID</th><th>Email</th><th>University</th><th>Phone Number</th></tr>";
    echo "<tbody>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['university'] . "</td>";
        echo "<td>" . $row['phoneNumber'] . "</td>";
        echo "</tr>";

    }
    echo "</tbody></table>";
}
?>
        </tbody>
    </table>
            </div>

<div class="container">
    <ol>
        <li><a href="admin_add_cust.php">Add Customer</a></li>
        <li><a href="admin_update_cust.php">Update Customer</a></li>
        <li><a href="admin_delete_cust.php">Delete Customer</a></li>
        <li><a href="admin_index.php">Home</a></li>
    </ol>
</div>



    <!-- <h2>Update Customer</h2>

    <form action="" method="post">
        <label for="update_id">Customer ID:</label>
        <input type="text" id="update_id" name="id" required>

        <input type="email" id="email" name="email" required>
        <input type="text" id="university" name="university"required>
        <input type="text" id="phone_number" name="phone_number"required>
        <input type="submit" name="Update_customer" value="Update Customer">

    </form>

    <h2>Delete Customer</h2>
    <form action="" method="get">
        <label for="delete_id">Customer ID:</label>
        <input type="text" id="delete_id" name="delete_id" required>
        <button type="submit">Delete Customer</button>
    </form> -->

    
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
                    <li><a href="contact.php">Contact Us</a></li>
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
   

