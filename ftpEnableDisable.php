<?php
require_once('config.php');
?>
<?php

error_reporting(0);
include '/tmp/lang.php';
$cmd = "ps -aux | grep vsftpd";
exec($cmd,$output,$result);
if (count($output) >2){
;echo '		<script language=javascript>
			//parent.document.FTPservice.start.value="';echo $STR_Stop;;echo '";
			parent.document.FTPservice.start.disabled=true;
			parent.document.FTPservice.stop.disabled=false;
			parent.document.ftpport.ftpport.disabled=false;
			parent.document.ftpport.saveftpport.disabled=false;
			
		</script>
';}else{;echo '		<script language=javascript>
			//parent.document.FTPservice.start.value="';echo $STR_Start;;echo '";
			parent.document.FTPservice.start.disabled=false;
			parent.document.FTPservice.stop.disabled=true;
			parent.document.ftpport.ftpport.disabled=true;
			parent.document.ftpport.saveftpport.disabled=true;
			
		</script>
';
}
?>