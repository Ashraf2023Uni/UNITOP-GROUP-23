<?php

session_start();


require_once('php/connectdb.php');


if(isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

}




$error_message = 'Nw';
$success_message = 'Working';


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




    echo $admin_email; 
    $query = "SELECT password FROM admin_users WHERE email = :admin_email";
    $statement = $db->prepare($query);
    $statement->bindParam(':admin_email', $admin_email, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch();
    echo '   ';
   

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
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/home-page.css"/>
    <link rel="shortcut icon" type="icon" href="assests/Banners/logo.png"/>
    <!--NAVIGATION BAR-->
    <div class="links">
                <nav>
                    <div class="img-links">
                        <a href="index.php"><img src="assests/Navbar/home_4991416.png" class="home-icon"></a>
                        <a href="accounts.php"><img src="assests/Navbar/avatar_9892372.png" class="account-icon"></a>
                        <a href="basket.php"><img src="assests/Navbar/checkout_4765148.png" class="basket-icon"></a>
                        <a href="admin_pin.php"><img src="assests/Navbar/staffpic.png" class="staff-icon"></a>
                    </div>
                    <div class="page-links">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="accounts.php">Account</a></li>
                            <li><a href="basket.php">Basket</a></li>
                            <li><a href="admin_pin.php">Staff login</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    <title> Admin PW C </title>
</head>
<body>
     <!--Header - brand logo and navigation bar-->
     <header>

     <h1> Admin Password change </h1>
    <a href="admin_logout.php">Logout</a>
        <!--LOGO-->
        <div class="navbar">
            <img src="assests/Navbar/UT-new-logo.png" width="100px" alt="UNITOP logo">

            
   


<div class="container">
        <div id="admin-pw">
    <form action="" method="post">
        <label for="current_password">Current Password:</label><br>
        <input type="password" id="current_password" name="current_password" required><br><br>
</div>

<div id="admin-pw">
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
</div>

<div id="admin-pw">

        <label for="confirm_new_password">Confirm New Password:</label><br>
        <input type="password" id="confirm_new_password" name="confirm_new_password" required><br><br>

        <button type ="submit">Change Password</button>
    </form>
</div>
</div>
    
    <?php if (!empty($error_message)) : ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <?php if (!empty($success_message)) : ?>
            <p style="color: green;"><?php echo $success_message; ?></p>
            <?php endif; ?>
    </body>
</html>

