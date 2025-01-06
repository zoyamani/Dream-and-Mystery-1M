<?php
$host = "localhost";
$username = "root"; // Update if necessary
$password = ""; // Update if necessary
$database = "my_blog";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
