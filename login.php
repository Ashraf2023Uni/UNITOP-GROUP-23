<?php

if (isset($_POST['submitted'])){

  if ( !isset($_POST['Email'], $_POST['password']) ) {


   exit('Fill in the email and password fields');
    }


  
  require_once ("connectdb.php");

  try {

    $stat = $db->prepare('SELECT password FROM signup WHERE Email = ?');

           $stat->execute(array($_POST['Email']));
      
   
       if ($stat->rowCount()>0){  

      $row=$stat->fetch();

      if (password_verify($_POST['password'], $row['password'])){ 
        
       
             session_start();

        $_SESSION["Email"]=$_POST['Email'];

        header("Location:(index.php)");

        
        exit();
      
      } else {
       echo "<p> Error logging in because your password doesn't match </p>";
         }
      } else {
     
      echo "<p> Error logging in because your email wasn't found </p>";
      }
  }
  catch(PDOException $ex) {

    echo("Failed to connect to database.<br>");
  echo($ex->getMessage());
    exit;
  }

}



?>
