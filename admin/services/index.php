<?php
	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "yao";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$resArray = array();
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$sql_select = "SELECT id, title, content, created_at FROM news";
	$result = $conn->query($sql_select);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($resArray, $row);
		}
		$result = json_encode($resArray);
	} else {
	    $result = "[]";
	}
	echo $result;
	$conn->close();
?>