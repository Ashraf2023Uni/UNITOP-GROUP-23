<!--This page fetches the products from the database-->
<?php
/*require('php/connectdb.php');

// Function to get all products
function getAllProducts($db){
    $query = "SELECT product_id, product_name, price from products";
    $result = $db->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch all products
$products = getAllProducts($db);

// Sort products based on sorting option
$sort = isset($_POST['sort']) ? $_POST['sort'] : 'default';
switch($sort){
    case 'low-to-high':
        usort($products, function($a, $b) {
            return $a['price'] - $b['price'];
        });
        break;
    case 'high-to-low':
        usort($products, function($a, $b) {
            return $b['price'] - $a['price'];
        });
        break;
}

// Display sorted products
if(!empty($products)){
    foreach ($products as $product) {
        echo "<section class='product-card'>
            <a href='product-details.php?id=".$product['product_id']."'>
            <img src='assests/Products/".$product['product_id'].".png' alt='' id='Featured-Thumbnail'>
            <h4>".$product['product_name']."</h4>
            <p>£".$product['price']."</p>
            <button class='button'>More Details</button>
            </a>
            </section>";
    }
} else {
    echo "No products found.";
}*/
?>
