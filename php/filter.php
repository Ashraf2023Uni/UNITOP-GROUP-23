<!--This page allows for the products to be filtered by the 5 categories, Humayra Hussain 210005848-->

<?php
    /*require('php/connectdb.php');

    //Fetch products from database, based on the category
    $category = isset($_GET['category']) ? $_GET['category'] : '';
    $query = "SELECT product_id, product_name, price from products";

    if($category){
        $query .= " INNER JOIN product_categories pc ON products.id = pc.product_id
                    INNER JOIN categories c ON pc.category_id = c.category_id
                    WHERE c.category_name = :category";
    }

    $result = $db->prepare($query);
    $result->bindValue(':category', $category, PDO::PARAM_STR);
    $result->execute();

    $products = array();

    if($result->rowCount() > 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $products[] = $row;
         }
    }*/