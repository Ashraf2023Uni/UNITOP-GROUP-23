<?php
require('php/connectdb.php');

//function to get the category names and will be used to display in the menu bar
function getCategories($db) {
    //Empty array
    $categories = array();
    $query = "SELECT category_id, category FROM categories";
    $result = $db->prepare($query);
    $result->execute();

    //Fetch results as an array
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

    if(count($rows) > 0) {
        foreach($rows as $row) {
            $categories[] = $row;
        }
    }
    return $categories;

}

//FILTERING BASED ON CATEGORY
$category_id = isset($_GET['category']) ? $_GET['category'] : null;

//Function to get products per category
function getProductsByCategory($db, $category_id) {
    $products = array();
    $query = "SELECT p.product_id, p.product_name, p.price FROM products p
                INNER JOIN product_categories pc ON p.product_id = pc.product_id 
                INNER JOIN categories c ON pc.category_id = c.category_id WHERE c.category_id = ?";

   // if ($sort) {
    //    $query .= " ORDER BY p.price $sort";
    ////}

    $result = $db->prepare($query);
    $result->bindParam(1, $category_id, PDO::PARAM_INT);
    $result->execute();
    
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

    /*echo "rows";
    print_r($rows);*/

    if(count($rows) > 0) {
        foreach($rows as $row) {
            $products[] = $row;
        }
    }
    return $products;
}

//Check if sort option has been selected
//$sort = isset($_POST["sort"]) ? $_POST["sort"] : null;

//Get products based on category and sorting option
$products = getProductsByCategory($db, $category_id);