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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock and Orders Report</title>
</head>
<body>
    <h1>Stock Levels and Orders Report</h1>

    <h2>Current Stock Levels</h2>

    <?php

    $stockQuery = "SELECT product_id, product_name, stock FROM products ORDER BY product_name ASC";
    $stockResult = $db->query($stockQuery);

    echo "<table>";
    echo "<tr><th>Product ID</th><th>Product Name</th><th>Stock</th></tr>";
    while ($product = $stockResult->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>{$product['product_id']}</td><td>{$product['product_name']}</td><td>{$product['stock']}</td></tr>";
    }
    echo "</table>";
    ?>

    <h2>All Orders</h2>
    <?php
    
    $ordersQuery = "SELECT order_id, user_id, order_date, status FROM orders ORDER BY order_date DESC";
    $ordersResult = $db->query($ordersQuery);

    echo "<table>";
    echo "<tr><th>Order ID</th><th>User ID</th><th>Order Date</th><th>Status</th></tr>";
    while ($order = $ordersResult->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>{$order['order_id']}</td><td>{$order['user_id']}</td><td>{$order['order_date']}</td><td>{$order['status']}</td></tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
