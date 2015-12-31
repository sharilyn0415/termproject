<?php
	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "yao";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	if (isset($_POST['id'])) {
		$sql = "DELETE FROM news WHERE id = {$_POST['id']}"; 
		if ($conn->query($sql) === TRUE) {
		    echo "This record has been deleted!";
		    header( 'Location: ../index.html' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
		exit();
	}
?>