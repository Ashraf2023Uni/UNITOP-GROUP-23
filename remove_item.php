<?php
session_start();

// Check if product ID is provided
if(isset($_POST['prod_id'])) {
    $prod_id = $_POST['prod_id'];

    // Find the index of the product in the session array
    $index = array_search($prod_id, $_SESSION['prod_id']);

    // If the product is found, remove it from the session
    if($index !== false) {
        unset($_SESSION['prod_id'][$index]);
        unset($_SESSION['qty'][$index]);
        // Reindex the session arrays
        $_SESSION['prod_id'] = array_values($_SESSION['prod_id']);
        $_SESSION['qty'] = array_values($_SESSION['qty']);
    }
}

// Redirect back to the basket page
header("Location: basket.php");
exit;
?>
