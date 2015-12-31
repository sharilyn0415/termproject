<?php
	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "yao";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	if (isset($_GET['id'])) {
		$sql = "SELECT * FROM news WHERE id = {$_GET['id']}";
		$result = $conn->query($sql);
		$res = $result->fetch_assoc();
		$conn->close();
	}
?>
<html>
<head>
</head>
<body>
	<form action="services/update.php" method="POST">
		ID: <input type="text" name="id" value="<?php echo $res['id'] ?>" readonly /><br />
		Title: <input type="text" name="title" value="<?php echo $res['title'] ?>" /><br />
		Content: <input type="text" name="content" value="<?php echo $res['content'] ?>" /><br />
		Created at: <input type="text" value="<?php echo $res['created_at'] ?>" readonly/>
		<input type="submit" value="Submit">
	</form>
</body>	   
</html>
