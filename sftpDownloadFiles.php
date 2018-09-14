<?php
include('Net/SFTP.php');
$remoteFileNames=$_REQUEST['remoteFileName'];

$remoteLocation=$_REQUEST['remoteLocation'];

$remoteFile=$remoteLocation ."/". $remoteFileNames;

$sftpHost=$_REQUEST['sftpHostName'];
$sftpUserName=$_REQUEST['sftpUserName'];
$sftpPassword=$_REQUEST['sftpPassword'];

$localFile="Bin/". $remoteFileNames;

$sftp = new Net_SFTP($sftpHost);
if (!$sftp->login($sftpUserName, $sftpPassword)) {
    exit('Login Failed');
}else{
if($sftp->get($remoteFile,$localFile)){
	  echo "true";
	  
}else{
	echo "Failed to Download File";
}
}
?>