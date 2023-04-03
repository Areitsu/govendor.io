<?php
// Connect to the MySQL database
$servername = "mysql://root:urnWYEZcoaCBS0LFv1et@containers-us-west-202.railway.app:6183/railway";
$username = "root";
$password = "urnWYEZcoaCBS0LFv1et";
$dbname = "railway";
$port = "6183";
$host = "containers-us-west-202.railway.app";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$vendor_name = $_POST['vendor_name'];
$vendor_location = $_POST['vendor_location'];
$vendor_type = $_POST['vendor_type'];

// Insert the data into the "vendors" table
$sql = "INSERT INTO vendors (vendor_name, vendor_location) VALUES ('$vendor_name', '$vendor_location')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
