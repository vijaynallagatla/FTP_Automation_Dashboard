<?php
/*
Author : Vijay Kumar N


*/

//POST Data from Form downloadWorkflow.php
$accessionNumber=$_REQUEST['accessionNumber'];

$url = "a1.xml";

$xmlStr = file_get_contents($url);

$xml = simplexml_load_file("a.xml")or die("Cannot create object"); 

$xmlAccession = $xml->SampleCorrelationID; 
	
	// Check for Accession in XML file 
	if($accessionNumber==$xmlAccession){
		
		$xmlTestPlanCount=$xml->Outcomes;
		$xmlTestPlanCount=$xmlTestPlanCount->LabOutcome->count();
		
		echo "<hr/><div class='col-xs-12 col-sm-8 col-md-3'>";
		echo "<label>Accession  : </label>" . $xmlAccession."</div>" ; // Print Accession Number
		echo "<div class=' col-xs-12 col-sm-8 col-md-3'>";
		echo "<label>Device Name : </label>" . $xml->DeviceDisplayName ."</div>"; //Print Interface Name
		echo "<div class=' col-xs-12 col-sm-8 col-md-5'>";
		echo "<label>GUID : </label>" . $xml->DeviceId . "</div>";
		echo "<div class='row'><div class='col-sm-12 col-lg-12 col-md-12'><b>Number of Test Names : </b>". $xmlTestPlanCount ."</div>";
		
		
		echo "</div><hr/>"; //Print GUID Id

		//Table to update Test Names matching in XML file
		echo "<table class='table table-condensed table-striped table-bordered table-hovered'>
				<tr>
				<th style='text-align:center'><b>Test Names</b></th>
				<th style='text-align:center'><b>Result<b></th>
				<th style='text-align:center'><b>Test Attributes<b></th>
				<th style='text-align:center'><b>Comments</b></th>
				</tr>";
				
				
				$xml=$xml->Outcomes;
				
				// Loop through the XML Nodes to get Test Name, Test Result, Error , Comments
				for($i=0;$i<$xmlTestPlanCount;$i++){
					echo "<tr>";
					echo "<td>". $xml->LabOutcome[$i]->TestName ."</td>";
					echo "<td>". $xml->LabOutcome[$i]->Result ."</td>";
					$testError=$xml->LabOutcome[$i]->TestAttributes;
					$testError=$testError->MDIAttribute->AttrValue;
					echo "<td>". $testError ."</td>";
					
					$outcomeCommentsCount=$xml->LabOutcome[$i]->OutcomeComments;
					$outcomeCommentsCount=$outcomeCommentsCount->MDIComment->count();
					if($outcomeCommentsCount>0){
						
						$outcomeComments=$xml->LabOutcome[$i]->OutcomeComments;
						
						$outcomeCommentsType=$xml->LabOutcome[$i]->OutcomeComments;
						
						
						echo "<td>";
						echo '<center><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Read</button></center>
							
						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">
						  
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Comments for Test Plan</h4>
							  </div>
							  <div class="modal-body">';
							  echo "<p>Test Name : ". $xml->LabOutcome[$i]->TestName ."</p>";
							  echo "<table class='table table-bordered table-condensed'>
								<tr>
									<th>Comment Type</th>
									<th>Comment </th>
								</tr>
							  ";
							  for($j=0;$j<$outcomeCommentsCount;$j++){
								  echo "<tr><td>". $outcomeCommentsType->MDIComment[$j]->Type ."</td>";
								  echo "<td>". $outcomeComments->MDIComment[$j]->Text ."</td></tr>";
								}
								
								echo "</table>";
							  echo '</div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
							</div>

						  </div>
						</div>
					';
					echo "</td>";
					} else {
						echo "<td> </td>";
					}
					echo "</tr>";
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