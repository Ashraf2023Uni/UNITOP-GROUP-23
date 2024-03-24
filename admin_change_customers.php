<?php

session_start();


    require_once('php/connectdb.php');

if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}



?>
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
        </tr>
        </thead>
        <tbody>
       
<?php



//view customers
$query = "SELECT * FROM customers";
$result = $db->query($query);
if ($result) {
    echo "<table>";
   // echo "<thead><tr><th>ID</th><th>Email</th><th>University</th><th>Phone Number</th></tr>";
    echo "<tbody>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['university'] . "</td>";
        echo "<td>" . $row['phoneNumber'] . "</td>";
        echo "</tr>";

    }
    echo "</tbody></table>";
}
?>
        </tbody>
    </table>

    <li><a href="admin_add_cust.php">Add Customer</a></li>
    <li><a href="admin_update_cust.php">Update Customer</a></li>
    <li><a href="admin_delete_cust.php">Delete Customer</a></li>
    <li><a href="admin_index.php">Home</a></li>





    <!-- <h2>Update Customer</h2>

    <form action="" method="post">
        <label for="update_id">Customer ID:</label>
        <input type="text" id="update_id" name="id" required>

        <input type="email" id="email" name="email" required>
        <input type="text" id="university" name="university"required>
        <input type="text" id="phone_number" name="phone_number"required>
        <input type="submit" name="Update_customer" value="Update Customer">

    </form>

    <h2>Delete Customer</h2>
    <form action="" method="get">
        <label for="delete_id">Customer ID:</label>
        <input type="text" id="delete_id" name="delete_id" required>
        <button type="submit">Delete Customer</button>
    </form> -->

    
    

        </body>
</html>

