<?php
session_start();

?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	
	<script>
		function downloadFile(){
			var xhttp;
			
			if (window.XMLHttpRequest) {
					// code for modern browsers
					xhttp = new XMLHttpRequest();
					} else {
					// code for IE6, IE5
					xhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
					document.getElementById("sftpConnection").innerHTML = xhttp.responseText;
					
				}
				};
				xhttp.open("POST", "download.php", true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send();	
				
		}
	
	</script>
</head>
	<body>
	<form method="post" action="connection.php">
		<button class="btn btn-success">Connect </button>
	</form>
		<button class="btn btn-primary" onClick="downloadFile()">Click Me </button>
		<div id="sftpConnection">
		
		</div>
	<body>
</html>