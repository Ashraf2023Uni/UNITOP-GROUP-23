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

//Determine the sort order based on POST request
$sortOption = '';
if(isset($_POST["sort"])){
    $sortOption = $_POST["sort"] == 'low-to-high' ? 'ASC' : ($_POST["sort"] == 'high-to-low' ? 'DESC' : '');
}

// Function to fetch products, filtering by category and sorting
function getProducts($db, $category_id = null, $sortOption = '') {
    $query = "SELECT p.product_id, p.product_name, p.price FROM products p";

    if (!is_null($category_id)) {
        // If a category is selected, join with the category tables
        $query .= " INNER JOIN product_categories pc ON p.product_id = pc.product_id
                    INNER JOIN categories c ON pc.category_id = c.category_id
                    WHERE c.category_id = :category_id";
    }

    // Add sorting
    if (!empty($sortOption)) {
        if ($sortOption == 'ASC' || $sortOption == 'DESC') {
            $query .= " ORDER BY p.price $sortOption";
        } else {
            // Default sort option: sort by product_id
            $query .= " ORDER BY p.product_id";
        }
    }

    $result = $db->prepare($query);

    if (!is_null($category_id)) {
        $result->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    }

    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

// Get category from URL query parameter
$category_id = isset($_GET['category']) ? $_GET['category'] : null;

// Fetch products based on category and sort order
$products = getProducts($db, $category_id, $sortOption);