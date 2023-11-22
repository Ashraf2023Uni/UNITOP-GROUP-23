<?php

$db_host = '';
$db_name = '';
$username = '';
$password = '';

try {
	$db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password); 
    echo("You are connected");
} catch(PDOException $ex) {
	echo("Failed to connect to database.<br>");
	echo($ex->getMessage());
	exit;	
}

?>