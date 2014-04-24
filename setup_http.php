<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include '/tmp/lang.php';
$filename = "/opt/etc/lighttpd/lighttpd.conf";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$dataPair = explode('=',$line[138]);
$port = $dataPair[1];
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">

<script language="javascript">
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

function changeport(){

	//var ok = confirm(\'If you change HTTP Port, Mvix Xtreamer will be Restarted..! \\n \\t Do you really want to proceed?\');
	if(!document.port.port.value){
		alert(\'';echo $STR_SpecifyPort;;echo '\');
		document.port.port.focus();
	}else if(!((document.port.port.value >= 80) && (document.port.port.value <= 90)) && !((document.port.port.value >= 7000) && (document.port.port.value <= 9999))){
		alert(\'';echo $STR_PortRange;;echo '\');
	}else{
		document.port.target = \'gframe\';
		document.port.action = \'port.php\';
		document.port.submit();
	}
}

function newwindow(w,h,webaddress,name){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>


		<form name="port" method="post" action=\'javascript:changeport();\'>
				  <table border="0" >

					  <tr><td ><font face="Arial" color="white" size="2">';echo $STR_PortNo;;echo '</td>
						<td width="170"><input type="text" name="port" class="textbox" size="20" maxlength="4" onKeyPress="onlyDigits();" value=';echo $port;;echo ' ></td>
						<td><input type="button" class=\'btn_2\' name="saveport" id="saveport" value="';echo $STR_Apply;;echo '" onClick="javascript:changeport();"></td>
					  </tr>
					  <tr><td></td><td><font face="Arial" color="white" size="2">';echo $STR_PortRange;;echo ' </td></tr>
				  </table>
		</form>




<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>

</body>
</html>
';?>