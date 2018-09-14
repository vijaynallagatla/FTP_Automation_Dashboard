<?php
/*
Author : Vijay Kumar N


*/

//POST Data from Form downloadWorkflow.php
$accessionNumber=$_REQUEST['accessionNumber'];
$testNames=$_REQUEST['testNames'];

$testNames=explode(',',$testNames);
$testNamesCount= count($testNames);
$testComments="--";
$testResult="--";
$url = "a.xml";

$xmlStr = file_get_contents($url);

$xml = simplexml_load_file("a.xml")or die("Cannot create object"); 

$xmlAccession = $xml->SampleCorrelationID; 
	
	// Check for Accession in XML file 
	if($accessionNumber==$xmlAccession){
		echo "<div class='row well'><div class='col-xs-12 col-sm-8 col-md-3'>";
		echo "<label>Accession  : </label>" . $xmlAccession."</div>" ; // Print Accession Number
		echo "<div class=' col-xs-12 col-sm-8 col-md-3'>";
		echo "<label>Device Name = </label>" . $xml->DeviceDisplayName ."</div>"; //Print Interface Name
		echo "<div class=' col-xs-12 col-sm-8 col-md-5'>";
		echo "<label>GUID = </label>" . $xml->DeviceId . "</div></div>"; //Print GUID Id

		//Table to update Test Names matching in XML file
		echo "<table class='table table-bordered table-hovered'>
				<tr>
				<td><b>Test Names</b></td>
				<td><b>Result<b></td>
				<td><b>Test Attributes<b></td>
				<td><b>Comment</b></td>
				</tr>";
				
				$xmlTestPlanCount=$xml->Outcomes;
				$xmlTestPlanCount=$xmlTestPlanCount->LabOutcome->count();
				$xml=$xml->Outcomes;
				
				// Loop through the XML Nodes to get Test Name, Test Result, Error , Comments
				for($i=0;$i<$testNamesCount;$i++){
					if($xml->LabOutcome[$i]->TestName == $testNames[$i]){
						echo "<tr>";
						echo "<td>". $xml->LabOutcome[$i]->TestName ."</td>";
						echo "<td>". $xml->LabOutcome[$i]->Result ."</td>";
						echo "<td>". $xml->LabOutcome[$i]->TestAttributes ."</td>";
						echo "<td>". $xml->LabOutcome[$i]->OutcomeComments ."</td>";			
						echo "</tr>";
					}
					else{
						echo "<tr>";
						echo "<td>". $testNames[$i] ."</td>";
						echo "<td>Not Found</td>";
						echo "<td>Test Name Not Found</td>";
						echo "<td></td>";			
						echo "</tr>";
					}
				}
				echo "</table>";
	}
	// If Accession does not match in XML file print Error Flag
	else{
		echo "<div class='well'>";
		echo "<center><label>Accession = </h4><pre style='display:inline'>Not Found</pre></center><br>";
		echo "</div>";
	}
		
?>