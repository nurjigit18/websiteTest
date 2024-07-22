<?php 

$host = "my_website.local";
$dbname = "login_db";
$username = "root";
$password = "756423Nurji";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_errno);
}

return $mysqli;