<?php

// Open a socket to port 8798 on localhost
$socket = stream_socket_client('tcp://10.184.2.53:8798');

if($socket != -1){

		echo ("Connect");
		// Send ordinary data via ordinary channels. 
		fwrite($socket, "hello");

		// Send more data out of band. 
		//stream_socket_sendto($socket, "Out of Band data.", STREAM_OOB);

		//echo stream_get_contents($socket);
	$out = fread($socket, 1024);
    echo $out;
	fclose($socket);
	
}
else
	echo ("Couldn't Connect");

/* 

if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created \n";
 
//Connect socket to remote server
if(!socket_connect($sock , '10.184.2.53' , 8798))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not connect: [$errorcode] $errormsg \n");
}
 
echo "Connection established \n";
 
$message = "\05";
 
//Send the message to the server
if( ! socket_send ( $sock , $message , strlen($message) , 0))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not send data: [$errorcode] $errormsg \n");
} 
*/

?>