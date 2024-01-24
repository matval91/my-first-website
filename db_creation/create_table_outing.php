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
$sql = "CREATE TABLE outings (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  date DATE NOT NULL,
  route_name VARCHAR(50) NOT NULL,
  length INT NOT NULL,
  Exposition VARCHAR(10) NOT NULL,
  Max_sport_level VARCHAR(10) NOT NULL,
  Alpine_Difficulty VARCHAR(10) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
  echo "Table outings created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>