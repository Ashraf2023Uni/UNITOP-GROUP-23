<?php
// Assuming you have a database connection established
require_once('connectdb.php');

// Fetch all orders from the database
$orderQuery = "SELECT * FROM orders";
$orderResult = $db->query($orderQuery);

// Generate HTML representation of orders
$html = '';
while ($order = $orderResult->fetch(PDO::FETCH_ASSOC)) {
    // Append order details to HTML string
    $html .= "<div class='all-info'>";
    $html .= "<div class='order-box'>";
    $html .= "<div class='date-header'><h3>Ordered on: " . substr($order['order_date'], 0, 10) . "</h3></div>";
    
    // Fetch order lines for the current order
    $orderlineQuery = "SELECT * FROM orderlines WHERE order_id = ?";
    $orderlineResult = $db->prepare($orderlineQuery);
    $orderlineResult->execute([$order['order_id']]);

    while ($orderline = $orderlineResult->fetch(PDO::FETCH_ASSOC)) {
        // Append order line details to HTML string
        $html .= "<div class='info'>";
        $html .= "<img src='assests/Products/" . $orderline['product_id'] . ".png' class='product-img'>";
        // Assuming you have a product name stored in the database or fetch it from products table
        $productName = "Product Name"; // Replace with actual product name
        $html .= "<p>" . $productName . "<br>Qty: " . $orderline['quantity'] . "</p>";
        $html .= "</div>";
    }

    // Add total price and delivery status
    $html .= "<p class='price-txt'><strong>Total Price:</strong> £" . $order['cost'] . "</p>";
    $html .= "<p class='status'>Delivery status: Processing</p>";

    $html .= "</div></div>";
}

// Output HTML representation of orders
echo $html;
