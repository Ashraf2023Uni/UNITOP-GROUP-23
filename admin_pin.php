<?php

include_once("php/connectdb.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$pin = $_POST['pin'];
$correctPin = '0000';

if ($pin === $correctPin) {
    header('Location: admin_register.php');
    exit;
} else {
$error_message = "Wrong Pin";
}
}

?>

<form action="" method="post">
    <label for "pin">Enter PIN:</label>
    <input type="password" id="pin" name="pin" required>
    <input type="submit" value="Submit">
</form>