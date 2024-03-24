<?php
session_start();

if(isset($_POST['rating'])){
    require_once('php/connectdb.php');

    echo "<link rel='stylesheet' href='css/home-page.css'>";
    echo "<link rel='stylesheet' href='css/write-review.css'><div id='review-store-wrapper'>";
    //collecting form + session data for database
    $prod_id = $_GET['id'];
    $customer_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $review = $_POST['review-text'];
    //$review = str_replace("'","\'",$review);

    //if user has reloaded this form to overwrite review
    if(isset($_POST['overwrite'])){
        $prev_id = $_POST['rev_id']; //id for past duplicate review sent to be deleted
        
        try{
            $query = "DELETE FROM reviews WHERE review_id =?";
            $deleteReview = $db->prepare($query);
            $deleteReview->execute([$prev_id]);
            echo"<h2>Review has been successfully overwritten</h2>";
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }

    $query = "SELECT review_id, review_text, rating FROM reviews WHERE customer_id = ? AND product_id = ?";
    $selectReview = $db->prepare($query);
    $selectReview->execute([$customer_id,$prod_id]);
    $pastReview=$selectReview->fetch();
    if($pastReview && !(isset($_POST['overwrite']))){
        echo"<h2>You have already written a review for this product:</h2> 
        <h3>Rating: ".$pastReview['rating']."/5.0<br>Comment: ".$pastReview['review_text']."";
        echo "<form action='review-stored.php?id=".$prod_id."' method='post'>
        <input type='hidden' id='rating' name='rating' value='".$rating."'>";?>
        <input type='hidden' id='review-text' name='review-text' value="<?php echo htmlentities($review);?>">
        <?php
        echo "<input type='hidden' id='overwrite' name='overwrite' value='overwrite'>
        <input type='hidden' id='rev_id' name='rev_id' value='".$pastReview['review_id']."'>
        <button type='submit'>Overwrite review</button>
        </form>  
        <a href='index.php'><button class='cancel'>Cancel</button></a>";
    }

    //entering review in review table
    if(!$pastReview || isset($_POST['overwrite'])){  //can't store if previous duplicate review has been spotted without user consent for overwriting
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
    echo"</div>";
} else{header('Location:index.php');}
?>
