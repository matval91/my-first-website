<?php
$servername = "localhost";
$username = "matteo";
$db_name = "test";
// Create connection
$conn = new mysqli($servername, $username, "",$db_name);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
  echo "Table created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>