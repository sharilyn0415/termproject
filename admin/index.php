<?php
	include('services/session.php');
	include('database/footer.php');
?>

<html>
<head>
	<script>
		var loadData = function() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(xhttp.readyState == 4 && xhttp.status == 200) {
					if(xhttp.responseText == "") {
						return;
					}
					var announcements = JSON.parse(xhttp.responseText);
					if(announcements.length == 0) {
						var res = "<th>There is no announcement!<th>";
					} else {
						var res = "<tr><th>ID</th><th>Title</th><th>Content</th><th>Created at</th><th></th><th></th></tr>";
						for(var i = 0; i < announcements.length; i++) {
							res += "<tr><td>"+announcements[i].id+"</td><td>"+announcements[i].title+"</td><td>"+announcements[i].content+"</td><td>"+announcements[i].created_at+"</td><td><a class='btn btn-primary btn-xs' href='edit.php?id="+announcements[i].id+"'>Edit</a></td><td><form method='POST' action='services/delete.php'><input type='hidden' name='id' value="+announcements[i].id+" /><input class='btn btn-primary btn-xs' type='submit' value='Delete' /></form></td></tr>";
						}
					}
					document.getElementById("data").innerHTML = res;
				}
			};
			xhttp.open("GET", "services/index.php", true);
			xhttp.send();
		}
	</script>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body onload="loadData()">
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
					<li><a class="btn btn-default" href="new.php">Create New</a></li>
					<li><a class="btn btn-default" href="index.php">Manage page</a></li>
					<li><a class="btn btn-danger" href="services/logout.php">Log Out</a></li>
				</ul>
			</div>	
		</div>
		<div id="body">
			<h1>Manage System</h1>
			<table id="data" class="table table-hover"></table >
		</div>
		<div id="footer">This is the footer</div>
</body>
</html>

