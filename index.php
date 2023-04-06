<!DOCTYPE html>
<html>
<head>
	<title>Display MySQL data in HTML table using PHP</title>
</head>
<body>

<table border="1">
	<tr>
		<th>ID</th>
		<th>PARTY NAME</th>
		<th>SCORE</th>
	</tr>

	<?php
	// Connect to the MySQL database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bincom_mysql";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// Query the database
	$sql = "SELECT * FROM announced_pu_results WHERE polling_unit_uniqueid = 25 ";
	$result = mysqli_query($conn, $sql);

	// Display the data in a table
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "<tr><td>" . $row["polling_unit_uniqueid"]. "</td><td>" . $row["party_abbreviation"]. "</td><td>" . $row["party_score"]. "</td></tr>";
	    }
	} else {
	    echo "0 results";
	}

	mysqli_close($conn);
	?>

</table>

</body>
</html>
