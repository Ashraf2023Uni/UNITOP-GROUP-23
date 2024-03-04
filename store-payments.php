<?php
session_start();
require_once('php/connectdb.php');
//collecting form data
$card_num = $_REQUEST['num'];
$cvv = $_REQUEST['cvv'];
$expMonth = $_REQUEST['expMonth'];
$expYear = $_REQUEST['expYear'];
$email = $_REQUEST['email'];
$name = $_REQUEST['fullname'];
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$town = $_REQUEST['area'];
$postcode = $_REQUEST['postcode'];

$expDate = $expMonth . "/" . $expYear;

$intoPaymentDetails = "INSERT INTO payment_details (card_name, card_num, cvv, expiration, email) 
VALUES ('$name', '$card_num', '$cvv', 
'$expDate', '$email')";

$intoAddress = "INSERT INTO address (email, address_line, city, town, postcode)
VALUES('$email', '$address', '$city', '$town', '$postcode')";

//inserting data into payment_details table
try{
    $db->query($intoAddress);
    echo"Address successfully stored <br>";}
catch(PDOException $ex){
    echo"Failed to store payment data <br>";
    echo($ex->getMessage());
    echo"<br><br> <a href='../payments.php'><button> Re-enter payment method </button></a><br>";
    echo"<br><br> <a href='../index.php'><button> Back to Homepage </button></a ><br>";
}

//inserting data into address table
try{
    $db->query($intoPaymentDetails);
    echo"Payment data successfully stored";
} catch(PDOException $ex){
    echo"Failed to store payment data <br>";
    echo($ex->getMessage());
    echo"<br><br> <a href='../payments.php'><button> Re-enter payment method </button></a><br>";
    echo"<br><br> <a href='../index.php'><button> Back to Homepage </button></a ><br>";
}

//processing order: updating products table
require_once('php/connectdb.php');
try{
    $total_cost = 0;
    echo "<h3>Order was successful!</h3>";
    echo "<h2>Reciept:</h2>";
    for($i=0;$i<count($_SESSION['prod_id']);$i++){  
        $id = $_SESSION['prod_id'][$i];
        $order = "SELECT stock, product_name, price FROM products WHERE product_id = $id";
        $current = $db->query($order)->fetch(); //current details before order
        $new_stock = intval($current['stock']) - intval($_SESSION['qty'][$i]);
        $enter_stock = "UPDATE products SET stock = '$new_stock' WHERE product_id = $id";
        $db->query($enter_stock);
        


        // temporary reciepts:
        // $subtotal = $current['price'] * intval($_SESSION['qty'][$i]);
        // echo "<p>".$current['product_name']."         £".$current['price']." <em> X".$_SESSION['qty'][$i]."</em></p>";
        // $total_cost = $total_cost + $subtotal;
    }
    // echo "<strong><p>Total price: £".$total_cost."</p></strong>";
    $_SESSION['prod_id'] = array();
    $_SESSION['qty'] = array();
    echo "<br><br><a href='index.php'><button> Back to Homepage </button></a><br>"; 
}
catch(PDOException $ex){
    echo "Purchase failed";
    echo($ex->getMessage());
}

?>