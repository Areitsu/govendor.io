<?php

$servername = "mysql://root:YBrBrQfKH7bDV8z4B1ba@containers-us-west-203.railway.app:6259/railway";
$username = "root";
$password = "YBrBrQfKH7bDV8z4B1ba";
$dbname = "railway";

// Create a new mysqli instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input from the form
$username = $_POST["username"];
$password = $_POST["password"];

// Execute an SQL query to retrieve the user's hashed password from the database
$sql = "SELECT password FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // If the user exists in the database, verify the password
    $row = $result->fetch_assoc();
    $hashed_password = $row["password"];
    if (password_verify($password, $hashed_password)) {
        // If the password is correct, redirect the user to a success page
        header("Location: success.php");
    } else {
        // If the password is incorrect, redirect the user to an error page
        header("Location: error.php");
    }
} else {
    // If the user does not exist in the database, redirect the user to an error page
    header("Location: error.php");
}

$conn->close();
