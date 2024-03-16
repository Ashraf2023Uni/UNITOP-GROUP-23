<!DOCTYPE html>
<html>
<head>
	<title> Title </title>
<?php echo "<link rel ='stylesheet'type='text/css' href='css/home-page.css'>"; ?>
</head>
<body>
<?php 
require_once('php/connectdb.php');
$query = "SELECT product_id, product_name, price FROM laptops";
$all_laptops = $db->query($query);


if($all_laptops->rowCount()>0){
    while($laptop = $all_laptops->fetch()){
        echo"<div class='products'>
        <a href='product-details.php?id=".$laptop['product_id']."'>
        <img src='assests/Product/".$laptop['product_id'].".png' alt='' id='Featured-Thumbnail'>
        <h4>".$laptop['product_name']."</h4>
        <p>£".$laptop['price']."</p>
        </a>
        <button class='button'>Quick Add</button>
        </div>";
    }

}

?>
</body>
</html>
