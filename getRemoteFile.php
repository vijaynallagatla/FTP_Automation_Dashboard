<?php
/*
Author : Vijay Kumar N


*/

$fileName=$_REQUEST['remoteFile'];

$remoteFile="/ibus/DIDOMAIN_BUSDRIVER/logs/".$fileName;

include('Net/SFTP.php');

$sftp = new Net_SFTP('10.184.2.53');
if (!$sftp->login('esmadmin', 'Adminesm1')) {
    exit('Login Failed');
}

if($sftp->get($remoteFile,$fileName)){
	echo "<h3> File Content </h3><textarea class='form-control' rows='20' id='comment'>";
			echo readfile($fileName); 
			echo "</textarea>";
}else{
	echo "Failed To Download File : "+$fileName;
}

?>