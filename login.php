<?php session_start(); ?>

<html>
<head></head>
<body>
	<h3>Please Log In<h3>
	<form method="POST" action="admin/services/login.php">
		<input type="text" name="username" placeholder="User Name"><br>
		<input type="password" name="password" placeholder="Password"><br>
		<button>Submit</button>
	</form>
	<span>
		<?php 
			if (isset($_SESSION['login_error'])) {
				echo $_SESSION['login_error'];
				unset($_SESSION['login_error']);
			} 
		?>
	</span>
</body>
</html>