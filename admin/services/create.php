<?php
	include('../database/header.php');
	if (isset($_POST['title']) && isset($_POST['content'])) {
		$sql = "INSERT INTO news (title, content, created_at) VALUES ('{$_POST['title']}', '{$_POST['content']}', now())"; 
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    header( 'Location: ../index.html' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	include('../database/footer.php');
?>