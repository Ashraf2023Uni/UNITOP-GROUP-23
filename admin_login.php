<?php
include_once("connectdb.php");

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

    if($adminUser)
