<?php include('services/session.php'); ?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<form method="POST" action="services/create.php">
		Title: <input type="text" name="title"><br>
		Content: <textarea rows="4" cols="50" name="content" /></textarea><br>
		<input type="hidden" name="created_at" />
		<input type="submit" value="Submit!" />
	</form>
</body>
</html>