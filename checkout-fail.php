<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>UNITOP/HomePage</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/home-page.css"/>
    <link rel="stylesheet" href="css/receipt.css">
    <link rel="shortcut icon" type="icon" href="assests/Banners/logo.png"/>
</head>


<?php
if(!isset($_GET['ex'])){
    header('Location:index.php');
}
echo "<div id='checkout-fail'>";
echo "<h3>Sorry, the transaction has failed. Error:</h3>";
echo "<p>".$_GET['ex']."</p>";
echo "<a href='index.php'><button>Return to Homepage</button></a><br>";
echo "<a href='basket.php'><button>Return to Basket</button></a>";
echo "</div>";

?>

echo $_GET['ex'];?>