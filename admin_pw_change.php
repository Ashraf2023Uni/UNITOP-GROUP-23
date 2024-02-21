<?php

session_start();

require_once('php/connectdb.php');

$error_message = '.';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $current_password = $_POST['current_password'];
    #$new_password = 

}