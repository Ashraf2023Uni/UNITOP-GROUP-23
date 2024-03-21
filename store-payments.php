<?php
session_start();
require_once('php/connectdb.php');

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // If not logged in, redirect to login page
    header("Location: login.php"); 
    exit; 
}

$db->beginTransaction(); 
//collecting billing form data
$cardNum = $_REQUEST['num'];
$cvv = $_REQUEST['cvv'];
$expDate = $_REQUEST['expDate'];
$email = $_REQUEST['email'];
$name = $_REQUEST['fullname'];
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$town = $_REQUEST['area'];
$postcode = $_REQUEST['postcode'];

$user_id = $_SESSION['user_id'];

$rollback = false;


//inserting data into payment_details table
$enterPaymentDetails = "INSERT INTO payment_details (card_name, card_num, cvv, expiration, email, addressline, city, town, postcode) 
VALUES (?,?,?,?,?,?,?,?,?)";
try{
    $stmt = $db->prepare($enterPaymentDetails);
    $stmt->execute([$name, $cardNum, $cvv, $expDate, $email, $address, $city, $town, $postcode]);
    $recall_payment = $db->lastInsertId();
}catch(PDOException $ex){
    echo "Failed to store payment details<br>";
    echo($ex->getMessage());
    echo"<br><br> <a href='../payments.php><button>Re-enter payment method</button</a><br>";
    endTransaction(false, $db);
}

// $intoAddress = "INSERT INTO address (email, address_line, city, town, postcode)
// VALUES('$email', '$address', '$city', '$town', '$postcode')";

//inserting data into address table
// $enterAddress = "INSERT INTO address (email, address_line, city, town, postcode)
// VALUES(?,?,?,?,?)";
// try{
//     $stmt = $db->prepare($enterAddress);
//     $stmt->execute([$email, $address, $city, $town, $postcode]);
//     echo"Address successfully stored <br>";
//     $recall_address = $db->lastInsertId();
// }catch(PDOException $ex){
//     echo"Failed to store address data <br>";
//     echo($ex->getMessage());
//     echo"<br><br> <a href='../payments.php'><button> Re-enter address </button></a><br>";
//     $rollback = true;
// }


//processing order: updating products table
require_once('php/connectdb.php'); 
try{
    $GLOBALS['total_cost'] = 0;
    echo "<h3>Thank you, ".$_SESSION['email']."!<br>Your order is currently being processed</h3>";
    echo "<h2>Reciept:</h2>";

    $create_order = "INSERT INTO orders VALUES();";
    $enterOrder = $db->query($create_order);
    $order_id = $db->lastInsertId();

    echo "order_id:" .  $order_id;
    for($i=0;$i<count($_SESSION['prod_id']);$i++){  
        $prod_id = $_SESSION['prod_id'][$i];
        $select_prod = "SELECT stock, product_name, price FROM products WHERE product_id = ?";
        $stmt = $db->prepare($select_prod);
        $stmt->execute([$prod_id]);
        $current = $stmt->fetch();

        $newStock = intval($current['stock']) - intval($_SESSION['qty'][$i]);
        $enterStock = "UPDATE products SET stock = '$newStock' WHERE product_id = ?";
        $stmt = $db->prepare($enterStock);
        $stmt->execute([$prod_id]);
        
        //orderline table insert individual laptop model
        $qty = $_SESSION['qty'][$i];
        $enterOrderline = "INSERT INTO orderlines (order_id, product_id, quantity) VALUES (?,?,?)";
        $stmt = $db->prepare($enterOrderline);
        $stmt->execute([$order_id, $prod_id, $qty]);



        // temporary reciepts:
        $subtotal = $current['price'] * intval($_SESSION['qty'][$i]);
        echo "<p>".$current['product_name']."         £".$current['price']." <em> X".$_SESSION['qty'][$i]."</em></p>";
        $GLOBALS['total_cost'] = $GLOBALS['total_cost'] + $subtotal;
    }
    echo "<strong><p>Total price: £".$GLOBALS['total_cost']."</p></strong>";
    echo "  order_id: " .$order_id;
    $setCost = "UPDATE orders SET cost = ?, user_id = ? WHERE order_id = ?";
    $stmt = $db->prepare($setCost);
    $stmt->execute([$GLOBALS['total_cost'],$user_id,$order_id]);
    //$enterCost = $db->query($setCost);
    $_SESSION['prod_id'] = array();
    $_SESSION['qty'] = array();
    echo "<br><br><a href='index.php'><button>Back to Homepage</button></a><br>"; 
    endTransaction(true, $db);
}
catch(PDOException $ex){
    echo($ex->getMessage());
    endTransaction(false, $db);
}

function endTransaction($commit, $db){
    if($commit){
        $db->commit();
    }
    else{
        $db->rollback();
        echo "Transaction did not go through";
    }
}

?>