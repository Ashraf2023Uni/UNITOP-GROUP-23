<?php
session_start();

$_SESSION = array();

session_destroy();

echo "You have logged out";

echo "<br>Go back home? <a href='index.php'>home page</a>";
?>
