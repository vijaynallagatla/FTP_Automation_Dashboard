<?php
include('Net/SFTP.php');
session_start();
$sftp=$_SESSION['sftpObject'];

$sftp=unserialize($sftp);



$fileName="large.txt";

$remoteFile="/ibus/DIDOMAIN_BUSDRIVER/logs/large.txt";



if($sftp->get($remoteFile,$fileName)){
	echo "<h3> File Content </h3><textarea class='form-control' rows='20' id='comment'>";
			echo readfile($fileName); 
			echo "</textarea>";
}else{
	echo "Failed To Download File : "+$fileName;
}

?>
