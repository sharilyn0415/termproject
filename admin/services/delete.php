<?php
	include('../database/header.php');
	if (isset($_POST['id'])) {
		$sql = "DELETE FROM news WHERE id = {$_POST['id']}"; 
		if ($conn->query($sql) === TRUE) {
		    echo "This record has been deleted!";
		    header( 'Location: ../index.html' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	include('../database/footer.php');
?>