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

// Process registration form submission
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to insert new user into the database
    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // User registered successfully
        echo "Registration successful!";
        header("Location: login.html");
        exit; // Terminate the script after redirection
    } else {
        // Error in registration
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


// Close the database connection
$conn->close();
?>
