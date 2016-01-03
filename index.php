<!-- Use the  sample html and css file provided in the course resources folder 
	to build a home page for your website. You can customize the page by 
	modifying html and css files. Use your own colors and images. You will be 
	creating a minimum of 4 pages or more website. The subsequent pages 
	should have the same header, left navigation and footer, but the body may 
	contain different. Provide a sign in /signup option in the landing page. 
	On page to add html forms and process the form data using php on the server. 
	Use javascript, angJavscript and PHP code where ever needed  -->
<?php
	session_start();
?>
<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
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
					var res = "<h1>There is no announcement!<h1>";
				} else {
					var res = "<tr><td>ID</td><td>Title</td><td>Create at</td><td>Content</td></tr>";
					for(var i = 0; i < announcements.length; i++) {
						res += "<tr><td>"+announcements[i].id+"</td><td>"+announcements[i].title+"</td><td>"+announcements[i].created_at+"</td><td>"+announcements[i].content+"</td></tr>";
					}
				}
				document.getElementById("title").innerHTML = res;
			}
		};
		xhttp.open("GET", "admin/services/index.php", true);
		xhttp.send();
	}
	</script>
</head>
<body onload="loadData()">
	<div id="container">
		<div id="header">
			<div id="horizontalnav">
			<div class="navlinks">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><?php 
							if(isset($_SESSION['username'])){
								echo "<a href='admin/services/logout.php'>Log Out</a>";
							} else{
								echo "<a href='login.php'>Log in</a>";
							}
						?></li>
					<li><a href="admin/new.php">Create New</a></li>
					<li><a href="admin/index.php">Manage</a></li>
				</ul>
			</div>
		</div>
		</div>
		
		<div id="leftnav">
			<div class="leftbox">
				<a  class="btn btn-primary" href="login.php">Admin Access</a>
				<p><br><span class="glyphicon glyphicon-log-in"></span> Please log in for more options. Once you login, you'll be able to create, edit, and delete with the announcements.</p> 
			</div>
		</div>
		<div id="body">
			<h1>Announcements</h1>
			<table class="table table-hover" id="title"></table>
		</div>
		<div id="footer">This is the footer</div>
	</div>
</body>
</html>
