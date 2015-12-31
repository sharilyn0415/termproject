<?php
	include('../database/header.php');
	session_start();

	if(isset($_POST['username']) && isset($_POST['password'])) {
		$sql = "SELECT username, password FROM users WHERE username='{$_POST['username']}' AND password='{$_POST['password']}'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$_SESSION['username'] =	$_POST['username'];		
			header('Location: ../index.php');
		} else {
			$_SESSION['login_error'] = 'Please enter correct username and password!';
			header('Location: ../../login.php');
		}
	}

	include('../database/footer.php');
?>