<!DOCTYPE html>
<html>
    <head>
        <title>My first PHP Website - Registration</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back</a><br/><br/>
        <!--<form action="register.php" method="POST">-->
        <form method='POST'>
           Enter Username: <input type="text" 
           name="username" required="required" /> <br/>
           Enter password: <input type="password" 
           name="password" required="required" /> <br/>
           <input type="submit" value="Register"/>
        </form>
    </body>
</html>


<?php
$conn = new mysqli("localhost","matteo","","first_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Collect form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL query to insert data into the table
    $sql_is_user = "SELECT * FROM users WHERE username = '$username'";
    $is_user = $conn->query($sql_is_user);

    if ($is_user->num_rows > 0) {
        echo "User " . $username . " exists already";
        exit();
    }
    // SQL query to insert data into the table
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
