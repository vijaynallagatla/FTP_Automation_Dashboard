<!DOCTYPE html>
<html>
<body>

<?php

$accession = 16209000008;
$url = "a.xml";
$xmlStr = file_get_contents($url); 
$xml = new SimpleXMLElement($xmlStr); 
// seach records by tag value: 
$accession = $xml->xpath("//SampleCorrelationID[. = $accession]"); 
echo "Accession = " . $accession[0] . "<br>"; //print_r($accession);

$expectedTests = array("COLORQL"=>"DARK YELLOW", "NECQL"=>"Isolates", "BACQN"=>"56.40");

	$xml2 = simplexml_load_file($url);
    foreach($xml2->Outcomes->LabOutcome as $LabOutcome) {		
		echo "Test Name : " . $LabOutcome->TestName . " ---- ";
		echo "Result = " . $LabOutcome->Result . " ---- ";
		echo "Test Attributes = " . $LabOutcome->TestAttributes . " ---- ";
		echo "Test Comments = " . $LabOutcome->OutcomeComments . "<br>";
		if($LabOutcome->TestName == array_search($LabOutcome->Result,$expectedTests))
			echo "<h1>Found</h1>";
    } 

?> 
</body>
</html>