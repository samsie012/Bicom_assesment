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
	$username = "id20566440_bincom";
	$password = "Redmi07089804416.";
	$dbname = "id20566440_bincom_mysql";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// Run SQL query
   $sql = "SELECT party_abbreviation, SUM(party_score) as total_score FROM announced_pu_results GROUP BY party_abbreviation";
   $result = $conn->query($sql);

   // Display result in HTML table
  if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Party Abbreviation</th><th>Total Score</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["party_abbreviation"]."</td><td>".$row["total_score"]."</td></tr>";
    }
    echo "</table>";
   } else {
    echo "0 results";
   }

	mysqli_close($conn);
	?>

</table>

</body>
</html>
