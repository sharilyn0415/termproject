<?php
	include('database/header.php');

	session_start(); 

	if (isset($_SESSION['username'])) {
		$sql = "SELECT username, password FROM users WHERE username='{$_SESSION['username']}'";
		$result = $conn->query($sql);
		if ($result->num_rows == 0) {
			header('Location: ../login.php');
		} 
	} else {
		header('Location: ../login.php');
	}
?>