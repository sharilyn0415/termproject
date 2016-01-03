<?php
	include('services/session.php');
	include('database/footer.php');
?>

<html>
<head>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="horizontalnav">
				<div class="navlinks">
					<ul>
						<li><a href="../index.php">Home</a></li>
						<li><?php 
								if(isset($_SESSION['username'])){
									echo "<a href='services/logout.php'>Log Out</a>";
								} else{
									echo "<a href='login.php'>Log in</a>";
								}
							?></li>
						<li><a href="new.php">Create New</a></li>
						<li><a href="index.php">Manage</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="leftnav">
			<div class="leftbox">
				<?php echo "Welcome, <span style='text-decoration: underline'>{$_SESSION['username']}</span> <span class='glyphicon glyphicon-user'></span>" ?>
				<ul class="nav nav-pills nav-stacked">
					<li><a  class="btn btn-default" href="new.php">Create New</a></li>
					<li><a  class="btn btn-default" href="index.php">Manage page</a></li>
					<li><a  class="btn btn-danger" href="services/logout.php">Log Out</a></li>
				</ul>
			</div>	
		</div>
		<div id="body" >
			<form class="form-group" method="POST" action="services/create.php">
				Title: <input class="form-control" type="text" name="title"><br>
				Content: <textarea class="form-control" rows="4" cols="50" name="content" /></textarea><br>
				<input type="hidden" name="created_at" />
				<input class="btn btn-primary" type="submit" value="Submit" />
			</form>
		</div>
		<div id="footer">This is the footer</div>
	</div>
</body>
</html>

