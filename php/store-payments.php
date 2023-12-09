<?php   
require_once('connectdb.php');

$card_num = $_REQUEST['num'];
$cvv = $_REQUEST['cvv'];
$email = $_REQUEST['email'];
$name = $_REQUEST['fullname'];
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$area = $_REQUEST['area'];
$postcode = $_REQUEST['postcode'];

$query = "INSERT INTO payment_details (card_num, security_num, email, fullname, 
addressline, city, area, post_code) 
VALUES ('$card_num', '$cvv', '$email', 
'$name', '$address', '$city', '$area', '$postcode')";

try{
    $db->query($query);
    echo"Data successfully stored";
    echo"<br><br><a href='../index.php'><button> Back to Homepage </button></a>"; }
catch(PDOException $ex){
    echo"Failed to store data <br>";
    echo($ex->getMessage());
    echo"<br><br> <a href='../payments.php'><button> Re-enter payment method </button></a>";
    echo"<br><br> <a href='../index.php'><button> Back to Homepage </button></a>";
}
?>