<?php 
	include('database/header.php');
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
					var res = "<tr><td>ID</td><td>Title</td><td>Content</td><td>Created at</td><td></td><td></td></tr>";
					for(var i = 0; i < announcements.length; i++) {
						res += "<tr><td>"+announcements[i].id+"</td><td>"+announcements[i].title+"</td><td>"+announcements[i].content+"</td><td>"+announcements[i].created_at+"</td><td><a href='edit.php?id="+announcements[i].id+"'>Edit</a></td><td><form method='POST' action='services/delete.php'><input type='hidden' name='id' value="+announcements[i].id+" /><input type='submit' value='Delete' /></form></td></tr>";
					}
				}
				document.getElementById("data").innerHTML = res;
			}
		};
		xhttp.open("GET", "services/index.php", true);
		xhttp.send();
	}
</script>
</head>
<body onload="loadData()">
	<?php echo "Welcome, {$_SESSION['username']}" ?>
	<a href="services/logout.php">Log Out</a>
	<table id="data">
	</table>
	<a href="new.html">Create New</a>
</body>	   
</html>
