<?php
session_start();


require_once('php/connectdb.php');

/*
This line of code below retrieves 
the value associated with the 'id' 
key from the $_SESSION superglobal 
array and assigns it to the variable
$id. Session variables need to exist
across multiple pages during a users
session on a website. 
*/
if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}

$query = "SELECT * FROM products";
$statement = $db->query($query);
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>UNITOP/ Admin Dashboard</title>
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

    <!--Back button - to go back to dashboard-->
    <div class="admin-menu">
     <a href="admin_index.php">Admin/Dashboard</a>
    </div>

    <div class="admin">
    <h1>Product Stock Management</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Current Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['stock']; ?></td>
                    <td>
                        <form action="update_stock.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <input type="number" name="new_stock_level" placeholder="New Stock Level" required>
                            <button type="submit">Update Stock</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>

    <div class="container2">
        <form action="admin_logout.php" method="post" class="logout-form">
            <button type="submit" class="logout-button">Logout</button>
        </form>
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
    <!--Potentially more HTML soon -->

        <!--Potentially more JavaScript here-->
        <script>
            function showNotification(message) {

                const notification = document.createElement("div");
                notification.classList.add("notification");
                notification.textContent = message;

                document.body.appendChild(notification);

                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 3000);
            }

            const urlParams = new URLSearchParams(window.location.search);
            const successMessage =urlParams.get('success');
            if(successMessage) {
                showNotification(successMessage);
            }

            </script>

</body>
</html>






