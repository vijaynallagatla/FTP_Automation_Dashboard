<?php
include('Net/SFTP.php');

session_start();
$sftpHost=$_REQUEST['sftpHostName'];
$sftpUserName=$_REQUEST['sftpUserName'];
$sftpPassword=$_REQUEST['sftpPassword'];


$sftp = new Net_SFTP($sftpHost);
if (!$sftp->login($sftpUserName, $sftpPassword)) {
    exit('Login Failed');
}else{
	echo '<div class="row">
  <div class="col-lg-4">

    <div class="input-group">
	 <span class="input-group-btn">
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-home"></span></button>
      </span>
      <input type="text" class="form-control" id="remoteLocation" placeholder="Remote Location" value="'. $sftp->pwd .'"/>
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->';

	echo "<div class='col-md-8'><button class='btn btn-primary btn-sm' id='' onClick='downloadRemoteFile()'><span class='glyphicon glyphicon-download'></span> Download</button>
			<button class='btn btn-success btn-sm' id='' onClick=''><span class='glyphicon glyphicon-upload'> Upload</button>
			<button class='btn btn-info btn-sm' id='' onClick=''><span class='glyphicon glyphicon-refresh'> Reload</button>
			<button class='btn btn-danger btn-sm' id='' onClick=''><span class='glyphicon glyphicon-trash'> Delete</button>
			<button class='btn btn-warning btn-sm' id='' onClick=''><span class='glyphicon glyphicon-file'> Parse XML</button></div></div>";
			
			$dir= $sftp->nlist();
			
			//print_r($dir);
			$dirCount=count($dir);
			
  echo '
<table id="sftpDataTable" class="display table-condensed" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Selection</th>
                <th>File Name</th>
                <th>File Size</th>
                <th>File Type</th>
                <th>File Permissions</th>
                <th>Last Modified</th>
            </tr>
        </thead>
        
        <tbody>';
		for($i=0;$i<$dirCount;$i++){
            echo '
            <tr>
                <td>
						<input type="checkbox" name="remoteFileName[]" value="'; echo $dir[$i] .'">
				
				</td>
                <td> ';
				echo $dir[$i];
				echo '</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
            </tr>
			';
		}
       echo ' </tbody>
    </table>

';	

							//for($i=0;$i<$dirCount;$i++)

	//echo $dir[$i] . "<br/>";
}

?>