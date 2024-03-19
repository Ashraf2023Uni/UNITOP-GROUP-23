<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Customer Management</title>
    </head>
    <body>
        <div class="container">
            <h1>Customer Management</h1>
    <h2>View Customers</h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>University</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php

session_start();


require_once('php/connectdb.php');



if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}
//view customers
$query = "SELECT * FROM signup";
$result = $db->query($query);
if ($result) {
    echo "<table>";
   // echo "<thead><tr><th>ID</th><th>Email</th><th>University</th><th>Phone Number</th></tr>";
    echo "<tbody>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['University'] . "</td>";
        echo "<td>" . $row['PhoneNumber'] . "</td>";
        echo "</tr>";

    }
    echo "</tbody></table>";
}
?>
        </tbody>
    </table>
  

    
    

        </body>
</html>
<?php


//add customers
if (isset($_POST['add_customer'])) {
    $email = $_POST['email'];
    $university = $_POST['university'];
    $phoneNumber = $_POST['phone_number'];

    $insert_query = "INSERT INTO signup (Email, university, phoneNumber) VALUES (:email, :university, :phoneNumber)";
    $insert_statement = $db->prepare($insert_query);
    $insert_statement->bindParam(' :email', $email, PDO::PARAM_STR);
    $insert_statement->bindParam(' :university', $university, PDO::PARAM_STR);
    $insert_statement->bindParam(' :phoneNumber', $phoneNumber, PDO::PARAM_STR);

    if($insert_statement->execute()) {
        echo "Customer added succesfully.";
    } else {
        echo "Error: Failed to add customer.";
    }
}

//update customer
    if (isset($_POST['update_customer'])) {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $university = $_POST['university'];
        $phoneNumber = $_POST['phone_number'];

        $update_query = "UPDATE signup SET EMAIL=:email, university=:university, phoneNumber=phoneNumber WHERE id=id";
        $update_statement->bindParam(' :email', $email, PDO::PARAM_STR);
        $update_statement->bindParam(' :university', $university, PDO::PARAM_STR);
        $update_statement->bindParam(' :phoneNumber', $phoneNumber, PDO::PARAM_STR);
        $update_statement->bindParam(' :id', $id, PDO::PARAM_INT);

        if (update_statement->execute()) {
            echo "Customer updated successfully.";
        } else {
            echo "Error: Failed to update customer.";
        }
    }


    //delete customer
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];

        $delete_query = "DELETE FROM signup WHERE id=:id";
        $delete_statement = $db->prepare($delete_query);
        $delete_statement->bindParam(':id', $delete_id, PDO::PARAM_INT);

        if ($delete_statement->execute()) {
            echo "Customer deleted successfully.";
        } else {
            echo "Error: Failed to delete customer.";
        }

    }

    



?>