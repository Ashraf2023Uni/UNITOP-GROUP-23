<!DOCTYPE html>
<head>
<link rel="stylesheet" href="css/home-page.css"/>
<link rel="stylesheet" href="css/return-form.css"/>
</head>

<div id='form-wrapper'>
<?php
if(isset($_POST['confirmation'])){
    require_once('php/connectdb.php');
    $order_id = $_POST['id'];
    $reason = $_POST['reason'];

    $db->beginTransaction();


    try{
        $query = "UPDATE orders SET status=? WHERE order_id = ?";
        $setReturn = $db->prepare($query);
        $setReturn->execute(['Return', $_POST['id']]);


        $query = "INSERT INTO returned_orders (order_id, reason) VALUES (?,?)";
        $insertReturn = $db->prepare($query);
        $insertReturn->execute([$order_id,$reason]);

        $db->commit();
        echo "<h2>Thanks, we'll let you know once we recieve your items.</h2>
        <a href='index.php'><button>Return to Homepage</button></a>";
    }catch(PDOException $ex){
        $db->rollback();
        $ex_message = $ex->getMessage();
        echo $ex_message;
        echo "<br><a href='index.php'><button>Return to Homepage</button></a>";
    }

} elseif(!isset($_POST['id'])){
   header('Location:index.php');
} else{ ?>

    <form id='form' action='return-form.php' method='post'>
    <div id='txtarea'>
        <label >State reason for return:</label>
        <textarea id='returnTxt' placeholder='State reason...' name='reason' maxlength='256'></textarea>
    </div>
    <input type='hidden' name='confirmation' value='true'>
    <input type='hidden' name='id' value='<?php echo $_POST['id'] ?>'>
    <button>Confirm Return</button>
    </form>

<a href='accounts.php'><button>Cancel</button></a>
<?php }
?>

</div>