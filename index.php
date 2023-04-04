<!DOCTYPE html>
<html>
<head>
	<title>Vendor Information</title>
</head>
<body>
	<h1>Vendor Information</h1>

	<!-- Login Form -->
	<h2>Login</h2>
	<form method="post" action="login.php">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Login">
	</form>

	<!-- Signup Form -->
	<h2>Signup</h2>
	<form method="post" action="signup.php">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Signup">
	</form>

	<!-- Vendor Information Table -->
	<h2>Vendor Information</h2>
	<table>
		<tr>
			<th>Vendor Name</th>
			<th>Vendor Location</th>
		</tr>
		<?php
			// Connect to MySQL database
			$servername = "mysql://user:password@hostname:port/database";
			$username = "user";
			$password = "password";
			$dbname = "database";
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Retrieve vendor information from the database
			$sql = "SELECT vendor_name, vendor_location FROM vendors";
			$result = $conn->query($sql);

			// Output vendor information as table rows
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["vendor_name"] . "</td><td>" . $row["vendor_location"] . "</td></tr>";
				}
			}

			$conn->close();
		?>
	</table>
</body>
</html>