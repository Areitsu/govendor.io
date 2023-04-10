<?php
// retrieve form data
$vendor_name = $_POST['vendor_name'];
$food_item = $_POST['food_item'];
$location = $_POST['location'];

// connect to the database
$conn = mysqli_connect("localhost", "root", "", "govendor_db");

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// insert data into database
$sql = "INSERT INTO vendors (vendor_name, food_item, location) VALUES ('$vendor_name', '$food_item', '$location')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// close database connection
mysqli_close($conn);
?>