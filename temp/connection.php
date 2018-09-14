<?php 

include('Net/SFTP.php');

$sftp = new Net_SFTP('10.184.2.53');
if (!$sftp->login('esmadmin', 'Adminesm1')) {
    exit('Login Failed');
}

session_start();
$sftpObject=serialize($sftp);
$_SESSION['sftpObject']=$sftpObject;

?>