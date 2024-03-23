<?php

session_start();


    require_once('php/connectdb.php');

if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}





//add customers
if (isset($_POST['add_customer'])) {
    $Email = $_POST['Email'];
    $university = $_POST['university'];
    $phoneNumber = $_POST['phone_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO customers (Email, university, password, phoneNumber) VALUES (?, ?, ?, ?)");

$stmt->execute([$Email, $university, $password, $phoneNumber]);

$lastInsertId = $db->lastInsertId();

}


  


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Add Customer</title>
    </head>
    <body>
        <div class="container">
           



        
    <h2>Add Customers</h2>
    <form action="" method="post">

        <label for="Email">Email:</label>
        <input type="Email" id="Email" name="Email" required>

        <label for ="university">University:</label>
        <input type="text" id="university" name="university"required>

        <label for ="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number"required>

        <label for ="password">Password:</label>
        <input type="password" id="password" name="password"required>


        <input type="submit" name="add_customer" value="Add Customer">

        

    </form>


    <li><a href="admin_change_customers.php">Back to Customer Management?</a></li>


    
    

        </body>
</html>
