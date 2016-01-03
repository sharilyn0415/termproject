<?php
	include('../database/header.php');
	if (isset($_POST['title']) && isset($_POST['content'])) {
		$stmt = $conn->prepare("INSERT INTO news (title, content, created_at) VALUES (?, ?, now())");
		$stmt->bind_param("ss", $_POST['title'], $_POST['content']);

		if ($stmt->execute() == TRUE) {
		    header( 'Location: ../index.php' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	include('../database/footer.php');
?>