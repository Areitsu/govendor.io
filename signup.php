<?php
// Connect to the MySQL database
$servername = "mysql://root:YBrBrQfKH7bDV8z4B1ba@containers-us-west-203.railway.app:6259/railway";
$username = "root";
$password = "YBrBrQfKH7bDV8z4B1ba";
$dbname = "railway";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Retrieve user input from the form
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Hash the password before storing it in the database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Execute an SQL query to insert the user data into the database
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // Redirect the user to a success page
    header("Location: success.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn
?>