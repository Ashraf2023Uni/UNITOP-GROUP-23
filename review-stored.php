<?php
session_start();

if(isset($_POST)){
    require_once('php/connectdb.php');
    $prod_id = $_GET['id'];
    $customer_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $review = $_POST['review-text'];

    try{
        $query = "INSERT INTO reviews(customer_id,product_id,review_text,rating)  VALUES (?,?,?,?)";
        $enterReview = $db->prepare($query);
        $enterReview->execute([$customer_id,$prod_id,$review,$rating]);
        echo "<h2>Thank you for leaving a review!</h2>
             <a href='index.php'><button>Head back to Homepage</button></a>
             <a href='accounts.php'><button>View your orders</button></a>";
    }catch(PDOException $ex){
        echo "<h2>Review failed to send. Error: </h2>";
        echo $ex->getMessage();
        echo "<a href='accounts.php'><button>Back to Homepage</button></a>";
    }
}
?>
