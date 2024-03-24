
<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>UNITOP/Change Orders Status</title>
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

        <h1>Change Order Status</h1>

<?php
 
    require_once('php/connectdb.php');

if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}


$ordersQuery = "SELECT * FROM orders WHERE status = 'processing'";
$ordersResult = $db->query($ordersQuery);

?>

<div class="container">

<?php

if ($ordersResult->rowCount() > 0) {
    echo "<ul>";
    while ($order = $ordersResult->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>Order ID " . $order['order_id'] . " - status: " . $order['status'] . "</li>";
    }
    echo "</ul>";
    
} else {
    echo "<p>No pending orders.</p>";
}
?>
<form action="admin_change_orders.php" method="post">
<button type="submit" name="updateOrders" class="changePw-button">Update All Orders to Complete</button>
</form>
</div>

</body>
</html>