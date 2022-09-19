<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_name';
$port = 3306;

// Create connection
$conn = new mysqli($host, $user, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>