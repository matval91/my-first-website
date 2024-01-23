<!DOCTYPE html>
<html>
    <head>
        <title>My first PHP Website - Login</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back</a><br/><br/>
        <form action="login.php" method="POST">
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

    // SQL query to check if user and password exist in the table
    $sql = "SELECT * FROM users
    WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    echo "Login successful";
    // You can perform further actions here, such as redirecting the user to another page.
    } else {
    echo "Invalid username or password";
    }
}

// Close the database connection
$conn->close();
?>
