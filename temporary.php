<?php
session_start();
require_once('php/connectdb.php');
$query = "SELECT email FROM customers WHERE id=?";
$exec = $db->prepare($query);
$exec->execute([$_SESSION['user_id']]);
$email = $exec->fetch();

echo "product_id: ".$_GET['id'];
echo"<br>";
echo $email['email'];
echo"<br>";
echo "Rating: " . $_POST['rating'];
echo"<br>";
echo "Review: " . $_POST['review-text'];
?>
