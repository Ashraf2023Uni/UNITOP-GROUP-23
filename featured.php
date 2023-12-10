<!DOCTYPE html>
<html>
<head>
	<title> Title </title>
<?php echo "<link rel ='stylesheet'type='text/css' href='css/home-page.css'>"; ?>
</head>
<body>
<?php 
require_once('connectdb.php');
$query = "SELECT product_id, product_name, price FROM products";
$products = $db->query($query);


if($products->rowCount()>0){
    while($laptop = $products->fetch()){
        echo"<section class='products'>
        <a href='product-details.php?id=".$laptop['product_id']."'>
        <img src='assests/Product/".$laptop['product_id'].".png' alt='' id='Featured-Thumbnail'>
        <h4>".$laptop['product_name']."</h4>
        <p>£".$laptop['price']."</p>
        </a>
        <button class='button'>More Details</button>
        </section>";
    }

}

?>
</body>
</html>
