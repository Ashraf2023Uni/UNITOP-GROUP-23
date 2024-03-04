<form method="post">
    <label>Search</label>
    <input type="text" name="search">
    <input type="submit" name="submit">
</form>

<?php
    session_start();
    require('php/connectdb.php');

    if(isset($_POST["submit"])){
        $name = $_POST["search"];

        $query = "SELECT product_id, product_name, price FROM products WHERE product_name LIKE :searchName";


        $products = $db->prepare($query);
        $products->bindValue('searchName', '%' . $name . '%', PDO::PARAM_STR);
        $products->execute();

        if($products->rowCount()>0){
            while($laptop = $products->fetch()){
                echo"<section class='products'>
                <a href='product-details.php?id=".$laptop['product_id']."'>
            
                <img src='assests/Products/".$laptop['product_id'].".png' alt='' id='Featured-Thumbnail'>
    
                <h4>".$laptop['product_name']."</h4>
                <p>£".$laptop['price']."</p>
                <button class='button'>More Details</button>
                </a>
                </section>";
             }
        }else {
            echo "Name does not exist.";
        }
    }
?>