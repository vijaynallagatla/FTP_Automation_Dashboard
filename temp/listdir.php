<?php
include('Net/SFTP.php');

$sftp = new Net_SFTP('10.184.2.53');
if (!$sftp->login('esmadmin', 'Adminesm1')) {
    exit('Login Failed');
}

//print_r($sftp->nlist()); // == $sftp->nlist('.')
$a = $sftp->nlist(); // == $sftp->rawlist('.')
echo $a[0];
?>