<?php
session_start();


require_once('php/connectdb.php');

if(isset($_SESSION['admin_email'])) {
$admin_email = $_SESSION['admin_email'];

}


//delete customers
if(isset($_POST['delete_id'])) {
$delete_id = $_POST['delete_id'];

try {
$stmt = $db->prepare("DELETE FROM customers WHERE id = ?");
$stmt->execute([$delete_id]);

if ($stmt->rowCount() > 0) {
    echo "Customer deleted.";
} else {
    echo "Error: Could not find customer or could not delete.";
    }
} catch (PDOException $e) {
//handle errors here
echo "Error: " . $e->getMessage();
}
} else {
    echo "Error: No ID provided";
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Delete Customer</title>
    </head>
    <body>
        <div class="container">
           
<h2>Delete Customer</h2>
<form action="" method="post">
    <label for="delete_id">Customer ID to Delete:</label>    
    <input type="number" id="delete_id" name="delete_id" required>
    <input type="submit" value="Delete Customer">

</form>

<li><a href="admin_index.php">Home</a></li>

</div>

    
</body>
</html>
   
