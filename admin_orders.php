<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Change Orders Status</title>
    </head>
    <body>
        <h1>Change Order Status</h1>
<?php

session_start();


    require_once('php/connectdb.php');

if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}


$ordersQuery = "SELECT * FROM orders WHERE status = 'processing'";
$ordersResult = $db->query($ordersQuery);


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
<button type="submit" name="updateOrders">Update All Orders to Complete</button>

</form>
</body>
</html>