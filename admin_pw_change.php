<?php

session_start();

require_once('php/connectdb.php');

$error_message = 'Not working';
$success_message = 'Working';



if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    $id = $_SESSION['id'];

    $query = "SELECT password FROM admin_users WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($current_password, $result['password'])) {
        if ($new_password === $confirm_new_password) {

            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $update_query = "UPDATE admin_users SET password = :password WHERE id = :id";
            $update_statement = $db->prepare($update_query);
            $update_statement->bindParam(' :password', $hashed_password, PDO::PARAM_STR);
            $update_statement->bindParam(' :id', $id, PDO::PARAM_INT);


            if ($update_statement->execute()){
                $success_message = "Password Changed";
            } else {
                $error_message = "Failed to change pw";
            }
        } else {
            $error_message = "New pw and confirm new pw are not same";

        }
    } else {
        $error_message = "current pw not correct";
    }
            }
        
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin PW C </title>
</head>
<body>
    <h1> Admin Pw change </h1>
    <a href="admin_logout.php">Logout</a>

    <form action="" method="post">
        <label for="current_password">Current Password:</label><br>
        <input type="password" id="current_password" name="current_password" required><br><br>

        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
       
        <label for="confirm_new_password">Confirm New Password:</label><br>
        <input type="password" id="confirm_new_password" name="confirm_new_password" required><br><br>

        <button type ="submit">Change Password</button>
    </form>
    
    <?php if (!empty($error_message)) : ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <?php if (!empty($success_message)) : ?>
            <p style="color: green;"><?php echo $success_message; ?></p>
            <?php endif; ?>
    </body>
</html>    
