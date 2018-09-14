<!--
Author : Vijay Kumar N 
Title : File Transfer Protocol

Description : Purpose is to provide Interface to Parse the XML File with information provided
			  Operations :
			  1) Provide Accession Number to search for the Accession number in XML File
-->

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/myStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<script src="js/bootbox.min.js"></script>
	<script>
		$("body").ready(function(){
				$("#downloadValidation").hide();
			});
			
		var testNameCount=0;
		
		// Adding New Test Names TextBox 
		function addTestNames() {
			var txtBox = "<div class='col-xs-6 col-md-3 col-sm-4'><input type='text' class='form-control  txtBox' placeholder='Enter Test Name' id="+testNameCount+" /></div>"; 
			testNameCount++;
			$("#testNames").before(txtBox);      
		}
		
		// Send the Entered details to parse the information
		function parseFile(){
			var accessionNumber=document.getElementById("accessionNumber").value;
			var testNames=[];
			
			for(var i=0;i
						<testNameCount;i++){
				testNames[i]=document.getElementById(i).value;
			}
			
			testNames.join(',');
			var file=document.getElementById("file").value;
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
				document.getElementById("parsedDataResults").innerHTML = xhttp.responseText;
			}
			};
			xhttp.open("POST", "parseXMLFile.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("testNames="+testNames+"&accessionNumber="+accessionNumber+"&file="+file);
				}
	
			//Search from Accession number from "Accession" Tab
			function searchFromAccession(){
				var xhttp;
				var accessionNumber=document.getElementById("accessionNumber").value;
				if (window.XMLHttpRequest) {
					// code for modern browsers
					xhttp = new XMLHttpRequest();
					} else {
					// code for IE6, IE5
					xhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
					document.getElementById("searchFromAccessionResults").innerHTML = xhttp.responseText;
				}
				};
				xhttp.open("POST", "searchFromAccession.php", true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("accessionNumber="+accessionNumber+"&file="+file);	
			}
			
			function sftpConnection(){
				var xhttp;
				var sftpHostName=document.getElementById("sftpHostName").value;
				var sftpUserName=document.getElementById("sftpUserName").value;
				var sftpPassword=document.getElementById("sftpPassword").value;
				
				var accessionNumber=document.getElementById("accessionNumber").value;
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
					loadDataTable();
					$("#downloadValidation").show(1000);
				}
				};
				xhttp.open("POST", "connectSFTP.php", true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("sftpHostName="+sftpHostName+"&sftpUserName="+sftpUserName+"&sftpPassword="+sftpPassword);	
				
			}
			
					function loadDataTable(){
			$("#sftpDataTable").DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false
    } );
}
			
			
			function downloadRemoteFile(){
				var all_location_id = document.querySelectorAll('input[name="remoteFileName[]"]:checked');

				var aIds = [];

				for(var x = 0, l = all_location_id.length; x < l;  x++)
				{
					aIds.push(all_location_id[x].value);
				}

				var remoteFileNames = aIds.join(', ');
				var xhttp;
				var sftpHostName=document.getElementById("sftpHostName").value;
				var sftpUserName=document.getElementById("sftpUserName").value;
				var sftpPassword=document.getElementById("sftpPassword").value;
				
				var remoteFileLocation=document.getElementById("remoteLocation").value;
				if (window.XMLHttpRequest) {
					// code for modern browsers
					xhttp = new XMLHttpRequest();
					} else {
					// code for IE6, IE5
					xhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						$(".se-pre-con").fadeOut("slow");
					if(xhttp.responseText=="true"){
						bootbox.alert("Download Successful !!!", function() {
                console.log("Alert Callback");
            });
					}
					else{
						alert(xhttp.responseText);
					}
					
				}
				};
				xhttp.open("POST", "sftpDownloadFiles.php", true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("remoteFileName="+remoteFileNames+"&remoteLocation="+remoteFileLocation+"&sftpHostName="+sftpHostName+"&sftpUserName="+sftpUserName+"&sftpPassword="+sftpPassword);	
				
			}
			
			
			$(window).load(function() {
		
		
		$(".se-pre-con").fadeOut("slow");
	});
		</script>
	</head>
	<body>
	
		<div class="se-pre-con">
			
		</div>
		
		<div id="alert_placeholder">
		
		</div>
		
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
						<li>
							<a href="index.php">Simulator</a>
						</li>
						<li>
							<a href="macroCreation.php">Create Macro</a>
						</li>
						<li>
							<a href="scp.php" >SCP</a>
						</li>
						<li  class="active">
							<a href="downloadWorkflow.php">Upload Validation</a>
						</li>
						<li>
							<a href="#">MDI</a>
						</li>
						<li>
							<a href="#">BMDI</a>
						</li>
					
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">
								<span class="glyphicon glyphicon-user"></span> 
							</a>
						</li>
						<li>
							<a href="#">
								<span class="glyphicon glyphicon-log-in"></span> 
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<!-- Connect to Server to pull the log files through FTP  -->
		<div class="container">
			<div class="cardSFTP">
				<div class="row">
					<center>
					
						<h4> Connect to Remote Machine</h4>
					</center>
					<div class="col-sm-2 col-md-1 col-xs-4 ">
						<b>SFTP:</b>
					</div>
						<div class="col-sm-3">
							<input type="text" class="form-control input-sm" id="sftpHostName" placeholder="Enter Host Name"/>
							<br/>
						</div>
						<div class="col-sm-3">
							<input type="text" class="form-control input-sm" id="sftpUserName" placeholder="Enter User Name"/>
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
		
		<!-- Tabs to perform operations : 
				1) Search the xml file through Accession Number 
				2) Validate Test Names for a Accession number 
		-->
		<div class="container" id="downloadValidation">
		  <ul class="nav nav-pills">
			<li class="active"><a data-toggle="pill" href="#searchThroughAccession">Accession</a></li>
			<li><a data-toggle="pill" href="#validation">Validation</a></li>
		  </ul>
		  
		  <div class="tab-content">
		  <!-- Accession Tab -->
			<div id="searchThroughAccession" class="tab-pane fade in active">
				<div class="cardValidation">
					<div class="row">
						<div class="col-md-4">
							<input type="file" class="btn selectFile" id="file" value="Choose File to Parse" name="selectFile"/>
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" id="accessionNumber" placeholder="Enter Accession Number"/>
						</div>
						<div class="col-md-4 col-lg-4" >
							<button class="btn col-md-4 btn-success" id="" onClick="searchFromAccession()">Submit</button>
						</div>
					</div>
					<div id="searchFromAccessionResults">
						
					</div>
				</div>
				
			</div>
			
			<div id="validation" class="tab-pane fade">
				<div class="row">
				<div class="col-md-6">
					<div class="card">
						<h4>
							<u>Select the File to parse</u>
						</h4>
						<input type="file" class="btn selectFile" id="file" value="Choose File" name="selectFile"/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<h4> Enter Accession Number</h4>
						<div class="row">
							<div class="col-md-8">
								<input type="text" class="form-control" id="accessionNumber" placeholder="Accession Number"/>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="container">
			
			<h4> Enter Test Names</h4>
			<div class="row">
				<button class="btn btn-primary btn-md col-md-2" id="testNames" onClick="addTestNames()" style="margin-top:5px">
					<span class="glyphicon glyphicon-plus"></span>
					<b> Add </b>
				</button>
			</div>
			<div class="row">
				<button id="parseFile" class="btn btn-success btn-lg col-md-6" style="margin-top:10px;margin-left:auto;margin-right:auto;margin-bottom:0%" onClick="parseFile()">
					<b> Parse the File </b>
				</button>
			</div>
			<hr/>
		</div>
		<div class="container" id="parsedDataResults"></div>
		
		<div>
			</div>
			 </div>
		</div>

	
		<!-- Footer -->
		<footer class="footer">
			<div class="container">
				<center>
					<p class="text-muted">&copy; All Rights Reserved </p>
				</center>
			</div>
		</footer>
	</div>
	</body>
</html>