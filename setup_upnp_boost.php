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
$nasprocess=exec("ps|grep nmbd|wc -l");
if ($nasprocess >2)
{$nasstatus=$STR_NASStarted;
$statuscolor='lawngreen';}
else {$nasstatus=$STR_NASStopped;
$statuscolor='red';}
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;" onLoad="EnableDisable();">

<script language="javascript">

function EnableDisable(){
	document.gframe.location.href = \'EnableDisable.php\';
}

function startNas(){
	//document.write_form.Button1.disabled=false;
	//document.write_form.Button2.disabled=true;
	document.write_form.target = \'gframe\';
	document.write_form.action = \'startnas.php\';
	document.write_form.submit();

}

function stopNas(){
	//document.write_form.Button1.disabled=false;
	//document.write_form.Button2.disabled=true;
	document.write_form.target = \'gframe\';
	document.write_form.action = \'stopnas.php\';
	document.write_form.submit();
}

function Restart(){
	if(confirm(\'';echo $STR_RebootConfirm;echo '\')){
		document.write_form.target = \'gframe\';
		document.write_form.action = \'restart.php\';
		document.write_form.submit();
	}
}

function newwindow(w,h,webaddress,name){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>

		<form name="write_form" method="post">
		  <table border="0">
			  <tr><td><font face="Arial" color="white" size="2">';echo $STR_NAS_Mode.":";;echo '</td>
			  <td ><font face="Arial" color=';echo $statuscolor;;echo ' size="2">';echo $nasstatus;;echo '</td> </tr>
			 <tr> <td></td>	  <td><input type="button" class=\'btn_2\' name="Button1" value="';echo $STR_Start;;echo '" onClick="javascript:startNas();">
					  <input type="button" class=\'btn_2\' name="Button2" value="';echo $STR_Stop;;echo '" onClick="javascript:stopNas();"></td>
			  </tr>
			   <tr> <td><font face="Arial" color="white" size="2">NAS URL: </td>  
			   <td>			   
			   <font face="Arial" color="white" size="2"> ';echo '\\'.'\\'.$_SERVER['SERVER_NAME'];;echo '			   </td>

			  </tr> 	 
			  <tr></tr>
			  <tr>
			  <td><font face="Arial" color="white" size="2">HDPlayer:</td>
				  <td><input type="button" class=\'btn_2\' name="Restrt_button" value="';echo $STR_Reboot;;echo '" onClick="javascript:Restart();">
			  </td>
			  </tr>
	      </table>
		</form>


<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>


</body>
</html>
';?>