<?php

$db_host = 'localhost';
$db_name = 'unitop';
$username = 'root';
$password = '';

try {
	$db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password); 
} catch(PDOException $ex) {
	echo("Failed to connect to database.<br>");
	echo($ex->getMessage());
	exit;	
}