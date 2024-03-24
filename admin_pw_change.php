<?php

session_start();


require_once('php/connectdb.php');

/*
This line of code below retrieves 
the value associated with the 'id' 
key from the $_SESSION superglobal 
array and assigns it to the variable
$id. Session variables need to exist
across multiple pages during a users
session on a website. 
*/
if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}




$error_message = 'Not working';
$success_message = 'Working';

/*
This code block underneath is checking 
to see if the current HTTP request
method is POST. If it is POST then it
retrieves the values submitted via a 
form with fields named current_password,
new_password, and confirm_new_password. 
These values are sent when a 
user submits a form containing fields
for changing their password.
*/
    if(isset($_POST['current_password'])) {
    $current_password = $_POST['current_password'];
    echo '   s  ';
    echo $current_password;
    } else {
        echo "Please enter your current pw";
    }
    if(isset($_POST['new_password'])) {
    $new_password = $_POST['new_password'];
} else {
    echo " Please enter new pw";
}
if(isset($_POST['confirm_new_password'])) {
    $confirm_new_password = $_POST['confirm_new_password'];
} else {
    echo " Please confirm new pw";
}


/*
This block of code below is a database 
query that retrieves the password 
associated with a specific User ID from
the admin_users table.

The first line 
$query = "SELECT password FROM admin_users WHERE id = :id";
defines an SQL query 
string that selects the password column
from admin_users where the value in 
the id column matches the parameter 
:id. 

The second line
$statement = $db->prepare($query);
prepares the SQL 
query for execution. It creates a 
PDOStatement object and $db is used
to prepare the SQL query defined in 
$query. 

The third line 
$statement->bindParam(':id', $id, PDO::PARAM_INT);
binds the value
of the PHP variable $id to the parameter
:id in the prepared statement. It 
ensures the value of $id is safely
passed to the SQL query and prevents
SQL injection attacks. Then 
PDO::PARAM_INT makes sure that the 
parameter should be treated as an 
integer.

The fourth line 
$statement->execute();
executes the 
prepared statement by sending the SQL
query to the database server for 
execution.

The final line 
$result = $statement->fetch(PDO::FETCH_ASSOC);
gets the result from the executed SQL 
query. The result is retrieved as an
associative array.The result should 
contain the associated password with
the user ID stored in $id.
*/
    echo $admin_email; 
    $query = "SELECT password FROM admin_users WHERE email = :admin_email";
    $statement = $db->prepare($query);
    $statement->bindParam(':admin_email', $admin_email, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch();
    echo '   ';
    // print_r($result);
/*
This block of code below updates the 
password for an admin user in the 
database ensuring that the current 
password matches, the new password
is confirmed, and the passwords are
hashed before being stored.

The first line
    if ($result && password_verify($current_password, $result['password'])) {
is a condition that checks if $result
is not null or false and if the hashed 
version of $current_password matches the
stored hashed password in the database.

     Then the second line   
if ($new_password === $confirm_new_password) {
is an if statement within the if statement
It checks if the new password matches
the confirmed new 
password. ($confirm_new_password)

The third line
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
is used if both conditions are met
(the current pw matches and the new pw
matches the confirmed new pw). If they
are met then the third line is used.

This third line hashes the new password
using the password_hash() function with the 
PASSWORD_DEFAULT algorithm. This function
generates a new password hashed. This new
hashed pw will then be stored in the database. 
*/
    // echo '54';
    // echo $result;
    // echo 'test last';
    if(isset($current_password)){
        echo 'first if';
        if ($result && password_verify($current_password, $result['password'])) { 
            echo 'second if';
        
            if ($new_password === $confirm_new_password) {
    
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
                $update_query = "UPDATE admin_users SET password = :password WHERE email = :admin_email";
                $update_statement = $db->prepare($update_query);
                $update_statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);
                $update_statement->bindParam(':admin_email', $admin_email, PDO::PARAM_INT);
    /*
    
    */
    
                if ($update_statement->execute()){
                    $success_message = "Password Changed";
                } else {
                    $error_message = "Failed to change pw";
                }
            } else {
                $error_message = "New pw and confirm new pw are not same";
    
            }
        } else {
            $error_message = "current pw not correct";
        }
    }
        
        
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin PW C </title>
</head>
<body>
    <h1> Admin Pw change </h1>
    <a href="admin_logout.php">Logout</a>

    <form action="" method="post">
        <label for="current_password">Current Password:</label><br>
        <input type="password" id="current_password" name="current_password" required><br><br>

        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
       
        <label for="confirm_new_password">Confirm New Password:</label><br>
        <input type="password" id="confirm_new_password" name="confirm_new_password" required><br><br>

        <button type ="submit">Change Password</button>
    </form>
    
    <?php if (!empty($error_message)) : ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <?php if (!empty($success_message)) : ?>
            <p style="color: green;"><?php echo $success_message; ?></p>
            <?php endif; ?>
    </body>
</html>

