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

	if (isset($_POST['title']) && isset($_POST['content'])) {
		$sql = "INSERT INTO news (title, content, created_at) VALUES ('{$_POST['title']}', '{$_POST['content']}', now())"; 
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    header( 'Location: ../index.html' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
		exit();
	}
?>