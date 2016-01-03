<?php
	include('../database/header.php');
	if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['id'])) {
		$stmt = $conn->prepare("UPDATE news SET title = ?, content = ? WHERE id = ?");
		$stmt->bind_param("ssi", $_POST['title'], $_POST['content'], $_POST['id']);

		if ($stmt->execute() == TRUE) {
		    header( 'Location: ../index.php' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} 

	include('../database/footer.php');
?>