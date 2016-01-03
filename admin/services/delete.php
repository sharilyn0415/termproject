<?php
	include('../database/header.php');
	if (isset($_POST['id'])) {
		$stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
		$stmt->bind_param("i", $_POST['id']);

		if ($stmt->execute() == TRUE) {
		    echo "This record has been deleted!";
		    header( 'Location: ../index.php' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	include('../database/footer.php');
?>