<?php
session_start();


require_once('php/connectdb.php');

/*
This line of code below retrieves 
the value associated with the 'id' 
key from the $_SESSION superglobal 
array and assigns it to the variable
$id. Session variables need to exist
across multiple pages during a users
session on a website. 
*/
if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}

$query = "SELECT * FROM products";
$statement = $db->query($query);
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
            color: azure;
        }  
        
        h1, h2 {
            text-align: center;
            margin-top: 20px;
        }

        a {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            text-decoration: none;
            color:blue;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: palevioletred;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid green;
            text-align: left;
        }
        th {
            background-color: orange;
            color: darkblue;
        }
        td input[type="number"] {
            width: 80px;
            padding: 5px;
        }

        td button {
            padding: 5px 10px;
            background-color: darkmagenta;
            color:aqua;
            border: none;
            cursor: pointer;
        }

        td button:hover {
            background-color: darkgoldenrod;
        }

        .notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            background-color: yellow;
            color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);

        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="admin_logout.php">Logout</a>

    <h2>Product Stock Management</h2>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Current Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['stock']; ?></td>
                    <td>
                        <form action="update_stock.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <input type="number" name="new_stock_level" placeholder="New Stock Level" required>
                            <button type="submit">Update Stock</button>
            </form>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>

    <!--Potentially more HTML soon -->

        <!--Potentially more JavaScript here-->
        <script>
            function showNotification(message) {

                const notification = document.createElement("div");
                notification.classList.add("notification");
                notification.textContent = message;

                document.body.appendChild(notification);

                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 3000);
            }

            const urlParams = new URLSearchParams(window.location.search);
            const successMessage =urlParams.get('success');
            if(successMessage) {
                showNotification(successMessage);
            }

            </script>

</body>
</html>






