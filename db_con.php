<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Assuming no password for the root user
$database = "portfolio_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

