<!--Humayra Hussain (210005848) and Noor Ahmed (220032003)-->
<style><?php include('../css/home-page.css') ?></style>
        <?php
            require_once('connectdb.php');
            $query = "SELECT product_id, product_name, stock, price FROM products";
            $all_laptops = $db->query($query);

            $count = 0;

            if($all_laptops->rowCount()>0){
                while($laptop = $all_laptops->fetch()){
                //Only show first 5 laptops
                if($count < 5){
                    echo"<div class='product-card'>
                    <div class='stock-indicator'>";
                    $stock_level = $laptop['stock'];
                    if($stock_level > 0){
                        if($stock_level > 10){
                            echo"<div class='in-stock'><p>In Stock</p></div>";
                        } else {
                            echo"<div class='low-stock'><p>Low in Stock</p></div>";
                        }
                    } else {
                        echo"<div class='out-stock'><p>Out of Stock</p></div>";
                    }
                echo"</div>
                        <a href='product-details.php?id=".$laptop['product_id']."'>
                        <img src='assests/Products/".$laptop['product_id'].".png' alt='' id='Featured-Thumbnail'>
        
                        <h4>".$laptop['product_name']."</h4>
                        <p>£".$laptop['price']."</p>
                        <button class='button'>More Details</button>
                        </a>
                        </div>";
                    $count++;
                } else {
                    //Break once 5 products displayed
                    break;
                }
    
            }
            }

        ?>