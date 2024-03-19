<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Stock Management</title>
</head>
<body>
    <div class="container">
        <h1>Admin Stock Management</h1>
        <?php
        session_start();
       

        require_once 'php/connectdb.php';

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo"<table>";
            echo "<tr><th>Product ID</th><th>Product Name</th><th>Current Stock</th><th>Action</th></tr>";
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row['$product_id'] . "</td>";
                echo "<td>" . $row['$product_name'] . "</td>";
                echo "<td>" . $row['$stock'] . "</td>";
                echo "<td><a href='update_stock.php?id=" . $row['$product_id'] . "'>Update Stock</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo " No products found. ";
        }
        ?>
        <br>
        <a href="admin_logout.php">Logout</a>
    </div>
    </body>
    </html>
