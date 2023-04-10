<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

// Select all data from the "vendors" table
$sql = "SELECT * FROM vendors";
$result = $conn->query($sql);

// Display the data in a table
if ($result->num_rows > 0) {
    echo "<table><tr><th>Vendor Name</th><th>Vendor Location</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["vendor_name"] . "</td><td>" . $row["vendor_location"] . "</td></tr>" . $row["vendor_type"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
