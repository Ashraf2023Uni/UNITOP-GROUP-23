<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
   
    </head>
    <body>
        <?php if (isset($_SESSION['success_message'])): ?>
    <div><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
<?php elseif (isset($_SESSION['info_message'])): ?>
    <div><?php echo $_SESSION['info_message']; unset($_SESSION['info_message']); ?></div>
<?php elseif (isset($_SESSION['error_message'])): ?>
    <div><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
<?php endif; ?>
       
    <li><a href="admin_index.php">Back to Home?</a></li>

 

        </body>
</html>
