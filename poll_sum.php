<!DOCTYPE html>
<html>
<head>
	<title>Display MySQL data in HTML table using PHP</title>
</head>
<body>

<table border="1">
	<tr>
		<th>TOTAL SCORE</th>
		
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
	$sql_1 = "SELECT polling_unit_id FROM polling_unit WHERE lga_id = 17";

	$sql = "SELECT SUM(party_score) as total_score FROM announced_pu_results WHERE polling_unit_uniqueid IN ($sql_1)";


	$result = mysqli_query($conn, $sql);

	// Display the data in a table
	// Display the data in a table
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "The sum total of the result from Sapele LGA is:"."<tr><td>" . $row["total_score"]. "</td><td>" ;
	    }}
	    
       
        
	

	mysqli_close($conn);
	?>

</table>

</body>
</html>
