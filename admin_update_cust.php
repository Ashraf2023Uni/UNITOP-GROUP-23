<?php
session_start();


require_once('php/connectdb.php');

if(isset($_SESSION['admin_email'])) {
$admin_email = $_SESSION['admin_email'];

}


//update customers
if(isset($_POST['update_customer'])) {
$id = $_POST['id'];
$update_email = $_POST['update_email'];
$update_university = $_POST['update_university'];
$update_phoneNumber = $_POST['update_phone_number'];
$update_password = password_hash($_POST['update_password'], PASSWORD_DEFAULT);


$stmt = $db->prepare("UPDATE customers SET Email = ?, university = ?, phoneNumber = ?, password = ? WHERE id = ?");

$stmt->execute([$update_email, $update_university, $update_phoneNumber, $update_password, $id]);

if ($stmt->rowCount() > 0) {
    echo "<p>Customer updated</p>";
} else {
    echo "<p>Error: Could not update customer or no changes</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Update Customer</title>
    </head>
    <body>
        <div class="container">
           
<h2>Update Customer</h2>
<form action="" method="post">
    <label for="update_id">Customer ID:</label>
    <input type="text" id="update_id" name="id" required>

    <label for="update_email">Email:</label>
    <input type="email" id="update_email" name="update_email" required>

    <label for="update_university">University:</label>
    <input type="text" id="update_university" name="update_university" required>

    <label for="update_phone_number">Phone Number:</label>
    <input type="text" id="update_phone_number" name="update_phone_number" required> 

    <label for ="update_password">Password:</label>
        <input type="password" id="update_password" name="update_password"required>

    <input type="submit" name="update_customer" value="Update Customer">
</form>

<li><a href="admin_index.php">Home</a></li>

</div>

    
</body>
</html>
   
