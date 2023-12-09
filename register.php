<?php

$db_host = 'localhost';
$db_name = 'unitop';
$username = 'root';
$password = '';


$db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password); 

if (isset($_POST['submitted'])){
   
     require_once('connectdb.php');



     $phoneNumber=isset($_POST['phoneNumber'])?$_POST['phoneNumber']:false;
     $university=isset($_POST['university'])?$_POST['university']:false;
  
     $email=isset($_POST['Email'])?$_POST['Email']:false;
     $password=isset($_POST['password'])?password_hash($_POST['password'],PASSWORD_DEFAULT):false;



     
     if (!($phoneNumber)){
       echo "Your number is not valid or already taken";
       exit;

     }

      if (!($university)){
       echo "Your uni is not valid";
       exit;

     }

     
     if (!($Email)){
       echo "Your Email is not valid or already taken";
       exit;

     }
     if (!($password)){
       exit("PassWord is not valid");
     }
    }


    try{ 
	
        $stat=$db->prepare("insert into signup values(default,?,?,?,?)");
        $stat->execute(array($Email, $university, $password, $phoneNumber));
        
        $id=$db->lastInsertId();
        echo "You are registered. Your ID is: $id  ";  	
        
     }
     catch (PDOexception $ex){
        echo "A database error has occurred. <br>";
        echo "Error details: <em>". $ex->getMessage()."</em>";
     }
    
    

?>
