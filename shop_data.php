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

// Get the form data
$vendor_name = $_POST['vendor_name'];
$vendor_location = $_POST['vendor_location'];
$vendor_type = $_POST['vendor_type'];

// Insert the data into the "vendors" table
$sql = "INSERT INTO vendors (vendor_name, vendor_location, vendor_type) VALUES ('$vendor_name', '$vendor_location', '$vendor_type')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
