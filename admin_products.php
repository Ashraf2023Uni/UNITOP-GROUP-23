<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product Management</title>
</head>
<body>
    <h1>Product Management</h1>
    <form action="admin_products.php" method="get">
        <input type="text" name="search" placeholder="Search products...">
        <select name="status">
            <option value="all">All</option>
            <option value="low_stock">Low Stock</option>
            <option value="out_of_stock">Out of Stock</option>
        </select>
        <button type="submit">Search</button>
    </form>
    <li><a href="admin_index.php">Home</a></li>

</body>
</html>

<?php

session_start();

require_once('php/connectdb.php');

if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : 'all';

$query = "SELECT * FROM products WHERE product_name LIKE :search";

if ($status == 'low_stock') {
    $query .= " AND low_stock_indicator = 1";
} elseif ($status == 'out_of_stock') {
    $query .= " AND out_of_stock_indicator = 1";
}

$stmt = $db->prepare($query);
$stmt->execute(['search' => "%$search%"]);



echo "<ul>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<li>" . htmlspecialchars($row['product_name']) . " - Stock: " . $row['stock'];
    if ($row['low_stock_indicator']) {
        echo " - Low Stock";
    }
    if ($row['out_of_stock_indicator']) {
        echo " - Out of Stock";
    }
    echo "</li>";
}
echo "</ul>";
?>

