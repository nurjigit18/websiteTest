<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (! preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password must contain at least one number");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                $_POST["name"],
                $_POST["email"],
                $password_hash);
                
try {
    if ($stmt->execute()) {
        header("Location: signup-success.html");
        exit;
    }
} catch (mysqli_sql_exception $e) {
    if ($mysqli->errno === 1062) {
        die("Email already taken" . "<br/>");
    } 
    else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}