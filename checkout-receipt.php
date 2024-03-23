



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>UNITOP/HomePage</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/home-page.css"/>
    <link rel="stylesheet" href="css/receipt.css">
    <link rel="shortcut icon" type="icon" href="assests/Banners/logo.png"/>
</head>


<?php
session_start();
require_once('php/connectdb.php');
$order_fetch = "SELECT * FROM orders WHERE order_id = ?";
$stmt = $db->prepare($order_fetch);
$stmt->execute([$_SESSION['order_id']]);
$order = $stmt->fetch();

$fetch_email = "SELECT email FROM customers WHERE id=?";
$stmt = $db->prepare($fetch_email);
$stmt->execute([$order['user_id']]);
$email = $stmt->fetch();

$orderlines_fetch = "SELECT * FROM orderlines WHERE order_id = ?";
$orderlines = $db->prepare($orderlines_fetch);
$orderlines->execute([$_SESSION['order_id']]);


echo"<div id='receipt-box'><h1>Thanks for ordering, ".$email['email']."! <br> Your order will be headed to you soon</h1>";
echo"<div id='items'><p>Ordered items:<p>";

while($orders = $orderlines->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='itemlines'><img src='assests/Products/".$orders['product_id'].".png' class='receipt-img'>";
    $productQuery = "SELECT product_name FROM products WHERE product_id = ?";
    $productResult = $db->prepare($productQuery);
    $productResult->execute([$orders['product_id']]);
    $productName = $productResult->fetch();
    echo "<p>".$productName['product_name']."<br>Qty: ".$orders['quantity']."</p></div>";
}

echo"</div><div id='price'>";
echo   "<p><strong>Total Price:</strong> £" . $order['cost'] . "</div>";
echo "<div id='button'><form action='index.php'><button type='submit'>Head back to Homepage</button></form></div></div>
</div></div>";




?>