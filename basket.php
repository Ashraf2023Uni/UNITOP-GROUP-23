<?php
session_start();

// Ensure $_SESSION['prod_id'] and $_SESSION['qty'] are initialized as arrays
if (!isset($_SESSION['prod_id'])) {
    $_SESSION['prod_id'] = array();
}
if (!isset($_SESSION['qty'])) {
    $_SESSION['qty'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>UNITOP/ Basket</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/home-page.css">
    <link rel="shortcut icon" type="icon" href="assests/Banners/logo.png" />

    <style>
        /* Your styles */
    </style>
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
        foreach ($categories as $category){
            echo "<a href='products-page.php?category={$category['category_id']}'>{$category['category']}></a>";
        }
        ?>
    </div>

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
    <!-- Logout Button -->
    <form action="logout.php" method="post">
    <button type="submit" name="logout" class="logout-button">Log Out</button>
    </form>
    <?php endif; ?>

   <!----cart item details--------->
   <div class="small-container cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
        
            <?php
            require_once('php/connectdb.php');

            // Check if form data is set
            if (isset($_POST['quantity']) && isset($_POST['prod_id'])) {
                $qty = $_POST['quantity'];
                $id = $_POST['prod_id'];

                // Add data to session arrays
                $_SESSION['prod_id'][] = $id;
                $_SESSION['qty'][] = $qty;
            }

            // Initialize total
            $total = 0;

            // Loop through session data
            for ($i = 0; $i < count($_SESSION['prod_id']); $i++) {
                $id = $_SESSION['prod_id'][$i];
                $quantity = $_SESSION['qty'][$i];
                $query = "SELECT product_name, price FROM products WHERE product_id = $id";
                $product = $db->query($query)->fetch();
                $subtotal = $product['price'] * $quantity;
                $total += $subtotal;
            ?>
                <tr>
                    <td>
                        <div class='cart-line'>
                            <img src='assests/Products/<?php echo $id; ?>.png' alt='Product Image'>
                            <div>
                                <p><?php echo $product['product_name']; ?></p>
                            </div>
                        </div>
                    </td>
                    <td>£<?php echo $product['price']; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>£<?php echo number_format($subtotal, 2); ?></td>
                    <td>
                        <form method='POST' action='remove_item.php'>
                            <input type='hidden' name='prod_id' value='<?php echo $id; ?>'>
                            <button type='submit' class='remove-button'>Remove</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <div class='total-price'>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>£<?php echo number_format($total, 2); ?></td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>£0</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>£<?php echo number_format($total, 2); ?></td>
                </tr>
            </table>
        </div>

        <?php
        // Check login status and display appropriate button
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            echo "<form action='HTML-files/payments.html'> <button type='submit' class='checkout-button'>Proceed to Checkout</button></form>";
        } else {
            echo "<form action='login.php'> <button type='submit' class='checkout-button'>Login to Checkout</button></form>";
        }
        ?>
    </div>

    <!--FOOTER-->
    <footer>
        <!-- Your footer content -->
    </footer>

</body>

</html>
