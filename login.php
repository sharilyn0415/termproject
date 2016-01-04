<?php session_start(); ?>
<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="horizontalnav">
			<div class="navlinks">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="login.php">Log in</a></li>
					<li><a href="admin/new.php">Create New</a></li>
					<li><a href="admin/index.php">Manage</a></li>
				</ul>
			</div>
		</div>
		</div>
		
		<div id="leftnav">
			<div class="leftbox">
				<ul class="nav nav-pills nav-stacked">
					<li><a  class="btn btn-default" href="admin/new.php">Create New</a></li>
					<li><a  class="btn btn-default" href="admin/index.php">Manage page</a></li>
					<?php if(isset($_SESSION['username'])) { ?>
						<li><a class="btn btn-danger" href="services/logout.php">Log Out</a></li>				
					<?php } ?>
				</ul>	
			</div>
		</div>
		<div id="body" class="row">
			<?php 
				if(isset($_SESSION['username'])){
					echo "<h1>You are already logged in to the system as <span style='text-decoration: underline;color:red'>{$_SESSION['username']}</span>!</h1>";
				} else {
					if (isset($_SESSION['login_error'])) {
						echo "<h3 style='color:red'>{$_SESSION['login_error']}</h3>";
						unset($_SESSION['login_error']);
					} 
					echo "<div class='col-md-9'>
						<h3>Please Log In<h3>
						 	<form method='POST' action='admin/services/login.php'>
							<div class='form-group'>
								<input class='form-control' type='text' name='username' placeholder='User Name'><br>
								<input class='form-control' type='password' name='password' placeholder='Password'><br>
								<button class='btn btn-primary'>Submit</button>
							</div>
						</form>
					</div>
					<div class='col-md-3'>
						<img src='images/login.jpeg' style='display: inline-block'>
					</div>";
				}
			?>
		</div>
		<div id="footer">This is the footer</div>
	</div>
</body>
</html>