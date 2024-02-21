<?php
session_start();



require_once('php/connectdb.php');

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





