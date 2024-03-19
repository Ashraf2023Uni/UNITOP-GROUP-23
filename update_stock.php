<?php
session_start();


require_once('php/connectdb.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
$product_id = $_POST['product_id']; 
$new_stock_level = $_POST['new_stock_level'];

$query = "UPDATE products SET stock = :stock WHERE product_id = :product_id";
$statement = $db->prepare($query);
$statement->bindParam(':stock', $new_stock_level, PDO::PARAM_INT);
$statement->bindParam(':product_id', $product_id, PDO::PARAM_INT);

if ($statement->execute()){
    header("Location: admin_dashboard.php");
    exit;
} else {
$error_message = "Failed to update stock level.";
    }
}

header("Location: admin_dashboard.php");
exit;
?>
