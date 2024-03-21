<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    
    header('Location: login.php');
    exit;
}

include_once("php/connectdb.php");


$user_id = $_SESSION['user_id'];

// Initialize variables for password change
$change_password_success = false;
$password_change_error = '';

// Query the database for the user's account information
try {
    $stmt = $db->prepare("SELECT * FROM customers WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
        
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];
        
        // Fetch the current password hash from the database
        if (password_verify($current_password, $user['password'])) {
            // Check if new password and confirm new password match
            if ($new_password === $confirm_new_password) {
                // Update the password in the database
                $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $update_stmt = $db->prepare("UPDATE customers SET password = ? WHERE id = ?");
                if ($update_stmt->execute([$new_password_hash, $user_id])) {
                    $change_password_success = true;
                } else {
                    $password_change_error = 'An error occurred while updating your password. Please try again.';
                }
            } else {
                $password_change_error = 'New passwords do not match.';
            }
        } else {
            $password_change_error = 'Current password is incorrect.';
        }
    }
} catch (PDOException $e) {
    // database errors
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/accounts.css">
    <link rel="shortcut icon" type="icon" href="assets/Banners/logo.png">
    <title>Your Account</title>
</head>
<body>

<header>
    <!-- PUT NAVBAR -->
</header>

<div class="account-container">
    <aside class="sidebar">
        <div class="sidebar-header">
            <h3>Personal Profile</h3>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#" id="showInfoBtn">Your Profile</a></li>
            <li><a href="#" id="showOrdersBtn">View Orders</a></li>
            <li><a href="#" id="showPasswordBtn">Change Password</a></li>
        </ul>
    </aside>
    <div class="profile-content">
        <div id="profile" class="section">
            <h2>Your Profile</h2>
            <?php if ($user): ?>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['Email']); ?></p>
                <p><strong>University:</strong> <?php echo htmlspecialchars($user['university']); ?></p>
                <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['phoneNumber']); ?></p>
            <?php else: ?>
                <p>Account details not found.</p>
            <?php endif; ?>
        </div>
        <div id="changePassword" class="section">
            <h2>Change Password</h2>
            <?php if ($change_password_success): ?>
                <p class="success">Password successfully updated.</p>
            <?php endif; ?>
            <?php if ($password_change_error): ?>
                <p class="error"><?php echo htmlspecialchars($password_change_error); ?></p>
            <?php endif; ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" name="current_password" id="current_password" required>
                </div>
                <div class="form-group">
                <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" id="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_new_password">Confirm New Password:</label>
                    <input type="password" name="confirm_new_password" id="confirm_new_password" required>
                </div>
                <button type="submit" name="change_password">Change Password</button>
            </form>
        </div>
    </div>
</div>

<footer>
    <!-- FOOTER -->
</footer>

<script src="js/accounts.js"></script>

</body>
</html>

