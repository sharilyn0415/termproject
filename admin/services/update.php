<?php
	include('../database/header.php');
	if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['id'])) {
		$sql = "UPDATE news SET title ='{$_POST['title']}', content ='{$_POST['content']}' WHERE id = {$_POST['id']}";
		if ($conn->query($sql) === TRUE) {
		    echo "Update successfully";
		    header( 'Location: ../index.html' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} 

	include('../database/footer.php');
?>