<?php
/*
Author : Vijay Kumar N


*/

// POST Data from form, Remote File Name
$fileName=$_REQUEST['remoteFile'];

$remoteFile="/ibus/DIDOMAIN_BUSDRIVER/logs/".$fileName;

include('Net/SFTP.php');

$sftp = new Net_SFTP('10.184.2.53');
if (!$sftp->login('esmadmin', 'Adminesm1')) {
    exit('Login Failed');
}

if($sftp->delete($remoteFile)){
echo "<h3> Deleted SuccessFully !!!</h3>";

}else{
	echo "Failed to Delete !!! Make Sure File Exists!";
}
?>