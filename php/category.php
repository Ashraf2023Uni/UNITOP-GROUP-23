<?php
require('php/connectdb.php');

//Function to get the category names for display in the menu bar
function getCategories($db){
    $categories = array();
    $query = " SELECT category_id, category FROM categories";
    $result = $db->prepare($query);
    $result->execute();
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($rows) > 0){
        foreach($rows as $row){
            $categories[] = $row;
        }
    }
    return $categories;
}


$sortOption = '';
if(isset($_POST["sort"])){
    $sortOption = $_POST["sort"] == 'low-to-high' ? 'ASC' : ($_POST["sort"] == 'high-to-low' ? 'DESC' : '');
}

//Function to fetch products, filtering by category
function getProducts($db, $category_id = null, $sortOption = ''){
    $query = "SELECT p.product_id, p.product_name, p.price, p.stock FROM products p";

    if(!is_null($category_id)){
        $query .= " INNER JOIN product_categories pc ON p.product_id = pc.product_id
                    INNER JOIN categories c ON pc.category_id = c.category_id
                    WHERE c.category_id = :category_id";
    }

    if(!empty($sortOption)){
        if($sortOption == 'ASC' || $sortOption == 'DESC'){
            $query .= " ORDER BY p.price $sortOption";
        } else{
            $query .= " ORDER BY p.product_id";
        }
    }

    $result = $db->prepare($query);

    if(!is_null($category_id)){
        $result->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    }

    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);

}

$category_id = isset($_GET['category']) ? $_GET['category'] : null;
//Products are to have an option for filtering by category and/or sorting by price range
$products = getProducts($db, $category_id, $sortOption);