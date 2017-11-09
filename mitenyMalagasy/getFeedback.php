<?php

if ($_GET["auth"] == "mm") {
	$servername = "localhost";
	$username = "v127008";
	$password = "T0mate";
	$dbname = "v127008";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$date = date('Y-m-d H:i:s');
	$id = mysqli_real_escape_string($conn, $_GET["id"]);
	$content = mysqli_real_escape_string($conn, $_GET["content"]);
	$sql = "INSERT INTO miteny_feedback (date, id, content)
	VALUES ('".$date."',".$id.", '".$content."')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

?>
