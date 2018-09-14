<!--
Author : Vijay Kumar N 
Title : File Transfer Protocol
Year : 2016

Description : Purpose is to perform FTP operations by connecting to remote Computer/Server over network
			  Operations :
			  1) Connect to Remote Computer/Server
			  2) Navigate through Directories
			  3) Access the File from Remote machine
			  4) Download the file to local machine
			  5) Upload File to Remote machine
			  6) Remove File in Remote machine
			  7) Update File in Remote machine
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
		<style>
			html {
			  height: 100%;
			  box-sizing: border-box;
			}

			*,
			*:before,
			*:after {
			  box-sizing: inherit;
			}

			body {
			  position: relative;
			  margin: 0;
			  padding-bottom: 6rem;
			  min-height: 100%;
			  font-family: "Helvetica Neue", Arial, sans-serif;
			}

				.footer {
					position:absolute;
			  bottom: 0;
			  
			  right:0;
			  left:0;
			  width: 100%;
			  /* Set the fixed height of the footer here */
			  height: 60px;
			  background-color: #f5f5f5;
			}

			.container .text-muted {
			  margin: 20px 0;
			}
			  
		</style>
		<script>
		
		</script>
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
						<li class="active">
							<a href="simulator.php">Simulator</a>
						</li>
						<li>
							<a href="macroCreation.php">Create Macro</a>
						</li>
						<li>
							<a href="scp.php">SCP</a>
						</li>
						<li>
							<a href="downloadWorkflow.php">Upload Validation</a>
						</li>
						<li>
							<a href="#">MDI</a>
						</li>
						<li>
							<a>BMDI</a>
						</li>					</ul>
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
		
		<!-- Container for Simulator -->
		
		<div class="container">
			<div class="card" >
				
				<div id="menu" style="margin-left:10px">
				<button class="btn btn-primary btn-sm" id="" onClick="" ><b><span class="glyphicon glyphicon-file"></span> New</b></button>
				<button class="btn btn-primary btn-sm" id="" onClick=""><b><span class="glyphicon glyphicon-save"></span> Save</b></button>
			<button class="btn btn-info btn-sm" id="" onClick=""><span class="glyphicon glyphicon-open"> Open</button>
			<button class="btn btn-success btn-sm" id="" onClick="" data-toggle="modal" data-target="#simulatorWindow"><span class="glyphicon glyphicon-play"> Run</button>
			<button class="btn btn-warning btn-sm" id="" onClick=""><span class="glyphicon glyphicon-pause"> Pause</button>
			<button class="btn btn-danger btn-sm" id="" onClick=""><span class="glyphicon glyphicon-stop"> Stop</button>
			
			</div>
			<div class="form-group" style="margin:10px">
  <textarea class="form-control" rows="25" id="comment" placeholder="Place your Macro here"></textarea>
</div>
			
			
			
			</div>
			
				
		</div>
		


			<!-- Macro Running state -->
<div id="simulatorWindow" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Simulator</h4>
      </div>
      <div class="modal-body">
			<div class="form-group">
				<textarea class="form-control" rows="15" cols="30" id="comment" input disabled></textarea>
				<div class="pull-right" style="margin:4px">
				<button class="btn btn-success btn-sm" id="" onClick="" ><b>ACK</b></button>
				<button class="btn btn-warning btn-sm" id="" onClick=""><b>NAK</b></button>
				<button class="btn btn-info btn-sm" id="" onClick=""><b>Clear</b></button>
			</div>
				<textarea class="form-control" rows="5" cols="30" placeholder="Customized ACK/NAK" id="comment"></textarea>
				<div class="pull-right" style="margin:4px">
				<button class="btn btn-success btn-sm" id="" onClick="" ><b>Play</b></button>
				<button class="btn btn-danger btn-sm" id="" onClick="" ><b>Stop</b></button>
				</div>
</div>
      </div>
      <div class="modal-footer" style="margin:4px">
		<!--		
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		-->
      </div>
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

