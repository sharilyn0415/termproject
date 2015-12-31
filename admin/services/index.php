<?php
	include('../database/header.php');

	$resArray = array();
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
	
	include('../database/footer.php');
?>