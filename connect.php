<?php
$servername = "180.180.44.12";
$username = "root";
$password = "T4cmQLSesETWynRP";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
