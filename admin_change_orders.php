<?php

session_start();


    require_once('php/connectdb.php');

if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}


if (isset($_POST['updateOrders'])) {
    try {
        $db->beginTransaction();
        $updateQuery = "UPDATE orders SET status = 'completed' WHERE status = 'processing'";
        $affectedRows = $db->exec($updateQuery);
        
        if ($affectedRows > 0) {
            $db->commit();
            $_SESSION['success_message'] = "All processing orders have been successfully completed.";
        } else {
            $db->rollBack();
            $_SESSION['info_message'] = "No processing orders found.";
        }
    } catch (PDOException $e) {
        $db->rollBack();
        $_SESSION['error_message'] = "An error has occurred: " . $e->getMessage();
    }
    
    header("Location: admin_has_changed_orders.php");
    exit;
}

?>

