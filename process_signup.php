<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (strlen($_POST["passwordReg"]) < 8) {
    die("Password must be at least 8 characters");
}

if (! preg_match("/[a-z]/i", $_POST["passwordReg"])) {
    die("Password must contain at least one letter");
}

if (! preg_match("/[0-9]/i", $_POST["passwordReg"])) {
    die("Password must contain at least one number");
}

$password_hash = password_hash($_POST["passwordReg"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash) 
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

$stmt->prepare($sql);



print_r($_POST);
var_dump($password_hash);