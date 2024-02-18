<?php
include_once("php/connectdb.php");

if(isset($_POST['submit'])) {
    $db_host = 'localhost';
    $db_name = 'unitop';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password);
    } catch (PDOException $ex) {

        echo "Failed to connect.";
        exit;
    }

    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;

    if(!$email || !$password) {
        echo "give both.";
        exit;
    }

    $stmt = $db->prepare("SELECT * FROM admin_users WHERE email = ?");
    $stmt->execute(array($email));
    $adminUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if($adminUser && password_verify($password, $adminUser['password'])) {
       header("Location: admin_index.php");
       exit;
    } else { 
        echo "Incorrect Details";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
    </head>
    <body>
        <div class="container">
            <div class="box">
                <header>Admin Login</header>
                <form action="admin_login.php" method="post">
                    <div class="input-field">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Email" required>
</div>

<div class="field">
    <input type="submit" class="button" name="submit" value="Login">
</div>
</form>   
<div class="links">
    Or register here <a href="admin_register.php">Staff sign up</a>
</div>
            </div>
        </div>
    </body>
</html>
