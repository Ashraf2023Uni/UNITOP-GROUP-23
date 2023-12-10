<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_host = 'localhost';
$db_name = 'u_220032003_db';
$username = 'u-220032003';
$password = 'szHRphD4DvTQYXz';

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password);

If(isset($_POST['submitted'])) {

$phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : false;
$university = isset($_POST['university']) ? $_POST['university'] : false;
$email = isset($_POST['Email']) ? $_POST['Email'] : false;
$password = isset($_POST['password']) ? password_hash($_POST['password'],PASSWORD_DEFAULT) : false; 
If(!$phoneNumber || !$university || !$email || !$password ){
exit("Invalid data");
}

try {
$stat = $db->prepare("INSERT INTO signup(Email, university, password, phoneNumber) VALUES (?, ?, ?, ?)");
$stat->execute(array($email, $university, $password, $phoneNumber));

	header("Location: register.html");
	exit;
} catch (PDOException $ex) {
echo "A database error has occurred.<br>";
echo "Error details: <em>" . $ex->getMessage() . "</em>";
	}
}
?>
