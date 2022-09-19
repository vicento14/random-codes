<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_name';
$port = 3306;

// Create connection
$conn = mysqli_connect($host, $user, $password, $database, $port);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>