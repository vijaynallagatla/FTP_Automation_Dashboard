<!--
Author : Vijay Kumar N 
Title : File Transfer Protocol
Year : 2016

-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CareAware</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/myStyle.css">
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Auto CareAware</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li >
							<a href="index.php">Simulator</a>
						</li>
						<li>
							<a href="macroCreation.php" >Create Macro</a>
						</li>
						<li  class="active">
							<a href="scp.php" >SCP</a>
						</li>
						<li>
							<a href="downloadWorkflow.php">Upload Validation</a>
						</li>
					<li>
							<a href="#">MDI</a>
						</li>
						<li>
							<a>BMDI</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">
								<span class="glyphicon glyphicon-user"></span> Sign Up
							</a>
						</li>
						<li>
							<a href="#">
								<span class="glyphicon glyphicon-log-in"></span> Login
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>


<div class="container">
			<div class="cardSFTP">
				<div class="row">
					<center>
					
						<h4> Server Control Panel</h4>
					</center>
					
						<div class="col-sm-3">
							<input type="text" class="form-control input-sm" id="sftpHostName" placeholder="Enter Domain Name"/>
							<br/>
						</div>
						<div class="col-sm-3">
							<input type="text" class="form-control input-sm" id="sftpUserName" placeholder="Enter UserName"/>
							<br/>
						</div>
						<div class="col-sm-3">
							
							<input type="password" class="form-control input-sm" id="sftpPassword" placeholder="Enter Password"/>
							<br/>
						</div>
						<div class="col-sm-3 col-md-2">
							
							<button class="btn btn-primary form-control input-sm" onClick="sftpConnection()">Connect</button>
							<br/>
						</div>
					</div>
				<div id="sftpConnection">
					
				</div>
			</div>
		</div>

		<!-- Footer -->
		<footer class="footer">
			<div class="container">
				<center>
					<p class="text-muted">CareAware &copy; All Rights Reserved </p>
				</center>
			</div>
		</footer>
    </body>
</html>

