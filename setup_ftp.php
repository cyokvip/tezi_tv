<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include '/tmp/lang.php';
if (file_exists("/opt/etc/vsftpd.conf")){
$filename1 = "/opt/etc/vsftpd.conf";
}else{
$filename1 = "/opt/etc/vsftpd.conf_stop";
}
$fp1 = fopen($filename1,'r');
$fileData1 = fread($fp1,filesize($filename1));
fclose($fp1);
$line1 = explode("\n",$fileData1);
$i = 0;
while ($i <= 10) {
$dataPair1 = explode('=',$line1[$i]);
if ($dataPair1[0] == 'listen_port') {
$FTPPort = $dataPair1[1];
break;
}
$i++;
}
$filename = "/opt/etc/inadyn.conf";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$i = 0;
while ($i <= 5) {
$dataPair = explode(' ',$line[$i]);
if ($dataPair[0] == '--username'){
$username = $dataPair[1];
}else if ($dataPair[0] == '--password'){
$password = $dataPair[1];
}else if ($dataPair[0] == 'alias'){
$domain = $dataPair[1];
}
$i++;
}
$ddnsprocess=exec("ps|grep inadyn|wc -l");
if ($ddnsprocess >2)
{
$url='ftp://root:toor@'.$domain.":".$FTPPort;
}else
{
$url='ftp://root:toor@'.$_SERVER["SERVER_ADDR"].":".$FTPPort;
}
$ftpprocess=exec("ps|grep vsftpd|wc -l");
if ($ftpprocess >2)
{$ftpstatus=$STR_FTPStarted;
$statuscolor='lawngreen';}
else {$ftpstatus=$STR_FTPStopped;
$statuscolor='red';}
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">

<script language="javascript">
//NUMBER ONLY
var isIE = document.all?true:false;
var isNS = document.layers?true:false;
function onlyDigits(e) {
	var _ret = true;
	if (isIE) {
		if (window.event.keyCode < 48 || window.event.keyCode > 57 ) {
		window.event.keyCode = 0;
		_ret = false;
		}
	}
	if (isNS) {
		if (e.which < 48 || e.which > 57) {
		e.which = 0;
		_ret = false;
		}
	}
	return (_ret);
}

function changeftpport(){

	if(!document.ftpport.ftpport.value){
		alert(\'';echo $STR_SpecifyFTPPort;;echo '\');
		document.ftpport.ftpport.focus();
	}else if((document.ftpport.ftpport.value != 21) && !((document.ftpport.ftpport.value >= 2000) && (document.ftpport.ftpport.value <= 6000))){
		alert(\'';echo $STR_FTPPortRange;;echo '\');
	}else if(confirm(\'';echo $STR_FTPPortChangeConfirm;;echo '\')){
		document.ftpport.target = \'gframe\';
		document.ftpport.action = \'ftpport.php\';
		document.ftpport.submit();
	}
}

function ftpEnableDisable(){
	document.gframe.location.href = \'ftpEnableDisable.php\';
}

function startps(){
	document.FTPservice.start.disabled=true;
	document.FTPservice.stop.disabled=false;
	document.ftpport.ftpport.disabled=false;
	document.ftpport.saveftpport.disabled=false;
	document.FTPservice.target = \'gframe\';
	document.FTPservice.action = \'FTPstart.php\';
	document.FTPservice.submit();
}

function stopps(){
	document.FTPservice.start.disabled=false;
	document.FTPservice.stop.disabled=true;
	document.ftpport.ftpport.disabled=true;
	document.ftpport.saveftpport.disabled=true;
	document.FTPservice.target = \'gframe\';
	document.FTPservice.action = \'FTPstop.php\';
	document.FTPservice.submit();
}

function newwindow(w,h,webaddress,name){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>


		<form name="ftpport" method="post" action=\'javascript:changeftpport();\'>
				  <table border="0" >
				  

					  <tr><td width="70"><font face="Arial" color="white" size="2">';echo $STR_FTPPortNo;;echo '</td>
						<td width="170"><input type="text" name="ftpport" class="textbox" size="20" maxlength="4" onKeyPress="onlyDigits();" value="';echo $FTPPort;;echo '"></td>
						<td><input type="button" class=\'btn_2\' name="saveftpport" id="saveftpport" value="';echo $STR_Apply;;echo '" onClick="javascript:changeftpport();"></td>
					  </tr>
					  <tr> <td></td> <td><font face="Arial" color="white" size="2">';echo $STR_FTPPortRange;;echo ' </td></tr>
				  </table>
		</form>
		</td>

	<tr><td width=100></td>
		<td>
		<form name="FTPservice" method="post">
		  <table border="0">
			  <tr><td width="70"><font face="Arial" color="white" size="2">';echo $STR_FTPServer;;echo '</td>
			      <td ><font face="Arial" color=';echo $statuscolor;;echo ' size="2">';echo $ftpstatus;;echo '</td>
				 <tr>  <td> </td><td><input type="button" class=\'btn_2\' name="start" value="';echo $STR_Start;;echo '" onClick="javascript:startps();"">
					  <input type="button" class=\'btn_2\' name="stop" value="';echo $STR_Stop;;echo '" onClick="javascript:stopps();""> </td></tr>
			  </tr>
			  <tr></tr>
			  <tr> <td><font face="Arial" color="white" size="2">FTP URL: </td> <td>
			  <font face="Arial" color="white" size="2"><a href=# onClick="newwindow(987, 675, \'';echo $url;;echo '\');";>';echo $url;;echo '</a></td>
			  </tr>
	      </table>

		</form>



<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>


</body>
</html>
';?>