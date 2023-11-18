<?php
session_start();
// Database configuration
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pro';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to retrieve user from the database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User authenticated successfully
        echo "Login successful!";
        header("Location:index.html");
        // Perform any additional actions or redirect to a different page
    } else {
        // Invalid credentials
        echo "Invalid username or password!";
    }


// Close the database connection
$conn->close();
?>
