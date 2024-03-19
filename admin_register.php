<?php
include_once("php/connectdb.php");

if(isset($_POST['submit'])) {
    $db_host = 'localhost';
    $db_name = 'unitop';
    $username = 'root';
    $password = '';


    try{
        $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password);
    } catch (PDOException $ex) {

        echo "Failed to connect.";
        exit;
    }

    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : false;
    $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : false;

    if(!$email || !$password || !$phoneNumber) {
        echo "Incorrect Data.";
        exit;
    }

    try{
       $stmt = $db->prepare("INSERT INTO admin_users (email, password, phoneNumber) VALUES (?, ?, ?)"); 
       $stmt->execute(array($email, $password, $phoneNumber));

       $last_id = $db->lastInsertId();
       echo "New record created. ID: " . $last_id;
       
       header("Location: admin_login.php");
       exit;
    } catch (PDOException $ex) {
        echo "a db error has happened.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css"> <!--Mohammed Alis style sheet -->
        <title> Admin Register </title>
</head>
<body>
    <div class="container">
        <div class="box f-box">  
            <header>Admin Sign Up</header>
            <form action="admin_register.php" method="post">
                <div class="field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                
                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>

                <div class="field">
                <label for="phoneNumber">Phone Number:</label>
                    <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" required>
                </div>

                <div class="field">
                <input type="submit" class="button" name="submit" value="Register">
                </div>
            </form>
            <div class="links">
                Already got an account? <a href="admin_login.php">Sign In</a>
            </div>
        </div>
    </div>
</body>
</html>                

