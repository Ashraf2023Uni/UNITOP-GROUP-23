<?php   
require_once('php/connectdb.php');

$card_num = $_REQUEST['num'];
$cvv = $_REQUEST['cvv'];
$expMonth = $_REQUEST['expMonth'];
$expYear = $_REQUEST['expYear'];
$email = $_REQUEST['email'];
$name = $_REQUEST['fullname'];
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$area = $_REQUEST['area'];
$postcode = $_REQUEST['postcode'];

$expDate = $expMonth . "/" . $expYear;

$query = "INSERT INTO payment_details (card_name, card_num, cvv, expiration, email) 
VALUES ('$name', '$card_num', '$cvv', 
'$expDate', '$email')";

try{
    $db->query($query);
    echo"Payment data successfully stored";
    echo"<br><br><a href='index.php'><button> Back to Homepage </button></a><br>"; }
catch(PDOException $ex){
    echo"Failed to store data <br>";
    echo($ex->getMessage());
    echo"<br><br> <a href='../payments.php'><button> Re-enter payment method </button></a><br>";
    echo"<br><br> <a href='../index.php'><button> Back to Homepage </button></a ><br>";
}

session_start();
require_once('php/connectdb.php');
try{
for($i=0;$i<count($_SESSION['prod_id']);$i++){
    $id = $_SESSION['prod_id'][$i];
    $order = "SELECT stock FROM products WHERE product_id = $id";
    $current_stock = $db->query($order)->fetch();
    $new_stock = intval($current_stock['stock']) - intval($_SESSION['qty'][$i]);
    $enter_stock = "UPDATE products SET stock = '$new_stock' WHERE product_id = $id";
    echo $new_stock;
    $db->query($enter_stock);
    unset($_SESSION['prod_id']);
    unset($_SESSION['qty']);
}
echo "Order was successful";
}
catch(PDOException $ex){
    echo "Purchase failed";
    echo($ex->getMessage());
}
?>