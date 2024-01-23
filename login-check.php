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
    $sql_is_user = "SELECT * FROM users
    WHERE username = '$username'";

    $is_user = $conn->query($sql_is_user);

    if ($is_user->num_rows > 0) {
        $row = $is_user->fetch_assoc();
        $hashed_password = password_hash($row["password"], PASSWORD_DEFAULT);

        // Compare the hashed password using password_verify
        if (password_verify($password, $hashed_password)) {
            echo "Login successful";
            // Redirect the user to the user homepage
            header("Location: home.php");
            exit();
        } else{
            echo "Invalid password";
        }
    // You can perform further actions here, such as redirecting the user to another page.
    } else {
    echo "Invalid username";
    }
}

// Close the database connection
$conn->close();
?>