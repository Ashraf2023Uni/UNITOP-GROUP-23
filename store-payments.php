<?php
session_start();
require_once('php/connectdb.php');

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // If not logged in, redirect to login page
    header("Location: login.php"); 
    exit; 
}
elseif(empty($_SESSION['prod_id'])){
    //redirects user if basket's been emptied
    header("Location: empty-basket.php");
    exit; 
}

$db->beginTransaction(); //making a save point in case queries need to rollback
//collecting billing form data
$cardNum = password_hash($_REQUEST['num'],PASSWORD_DEFAULT);
$cvv = password_hash($_REQUEST['cvv'], PASSWORD_DEFAULT);
$expDate = password_hash($_REQUEST['expDate'],PASSWORD_DEFAULT);
$email = $_REQUEST['email'];
$name = $_REQUEST['fullname'];
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$town = $_REQUEST['area'];
$postcode = $_REQUEST['postcode'];

$user_id = $_SESSION['user_id'];



//inserting data into payment_details table
$enterPaymentDetails = "INSERT INTO payment_details (card_name, card_num, cvv, expiration, email, addressline, city, town, postcode) 
VALUES (?,?,?,?,?,?,?,?,?)";
try{
    $stmt = $db->prepare($enterPaymentDetails);
    $stmt->execute([$name, $cardNum, $cvv, $expDate, $email, $address, $city, $town, $postcode]);
    $recall_payment = $db->lastInsertId();
}catch(PDOException $ex){
    echo "Failed to store payment details<br>";
    $ex_message = $ex->getMessage();
    echo"<br><br> <a href='../payments.php><button>Re-enter payment method</button</a><br>";
    endTransaction(false, $db, $ex_message);
}



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



        //adding to total cost with each product loop
        $subtotal = $current['price'] * intval($_SESSION['qty'][$i]);
        $GLOBALS['total_cost'] = $GLOBALS['total_cost'] + $subtotal;
    }

    $setCost = "UPDATE orders SET cost = ?, user_id = ?, status = ? WHERE order_id = ?";
    $stmt = $db->prepare($setCost);
    $stmt->execute([$GLOBALS['total_cost'],$user_id,'Processing',$order_id]);

    $_SESSION['order_id'] = $order_id;
    //resetting basket session arrays after successful checkout
    $_SESSION['prod_id'] = array();
    $_SESSION['qty'] = array();
    endTransaction(true, $db, null);
}
catch(PDOException $ex){
    $ex_message = $ex->getMessage();
    endTransaction(false, $db, $ex_message);
}

function endTransaction($commit, $db,$ex){
    if($commit){
        $db->commit();
        header('Location: checkout-receipt.php');
    }
    else{
        $db->rollback();
        header('Location: checkout-fail.php?ex='.$ex);
    }
}

?>