<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include '/tmp/lang.php';
$filename = "version.txt";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$i = 0;
while ($i <= 5) {
$dataPair = explode('=',$line[$i]);
if ($dataPair[0] == 'web_control'){
$web_version = $dataPair[1];
}
$i++;
}
$tag=exec("tail -n 1 /usr/local/bin/scripts/menu.rss");
if (strpos($tag,"hdpfans")){
$ims_status = $STR_RemoteIMS;}
else {$ims_status = $STR_LocalIMS;
}
if (file_exists("version_new.txt"))
{
$filename1 = "version_new.txt";
$fp = fopen($filename1,'r');
$fileData1 = fread($fp,filesize($filename));
fclose($fp);
$line1 = explode("\n",$fileData1);
$i = 0;
while ($i <= 5) {
$dataPair = explode('=',$line1[$i]);
if ($dataPair[0] == 'web_control'){
$web_version_new = $dataPair[1];
}
$i++;
}
if ($web_version_new!=$web_version &&$web_version_new!="")
{
$web_version= $web_version." --> ".$web_version_new;
}
}
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">

<script language="javascript">

function doupdate(){
        if(confirm(\'';echo $STR_ConfirmUpdate;;echo '\'))
        {	
 		loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.check_update.target = \'gframe\';
		document.check_update.action = \'update_web.php\';
		document.check_update.submit();	 
		}
}

function switchims(){
        if(confirm(\'';echo $STR_ConfirmSwitchIMS;;echo '\'))
        {		
 		loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.check_update.target = \'gframe\';
		document.check_update.action = \'switchims.php\';
		document.check_update.submit();	 
		}
}
function forceflash(){
        if(confirm(\'';echo $STR_ConfirmForceFlashFM;;echo '\'))
        {		
 		loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.check_update.target = \'gframe\';
		document.check_update.action = \'forceflash.php\';
		document.check_update.submit();	 
		}

}

function checkversion(){
        loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.check_update.target = \'gframe\';
		document.check_update.action = \'check_version.php\';
		document.check_update.submit();	 
}


function newwindow(w,h,webaddressname){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>


		<form name="check_update" method="post" action=\'javascript:doupdate();\'>
			<table border="0" >
				<tr>
					<td><font face="Arial" color="white" size="2">';echo $STR_WebVersionStatus;;echo '</font></td>
					<td width= 150 ><font face="Arial" color="white" size="2">';echo $web_version;;echo '</font></td>
                    <td><input type="button" class=\'btn_2\' name="check" value="';echo $STR_CheckVersion;;echo '" onClick="javascript:checkversion();"></td>					
					<td><input type="button" class=\'btn_2\' name="update" value="';echo $STR_Update;;echo '" onClick="javascript:doupdate();"></td>
				</tr>
                <tr>
					<td><font face="Arial" color="white" size="2">';echo $STR_IMSStatus;;echo '</font></td>
					<td width= 150 ><font face="Arial" color="white" size="2">';echo $ims_status;;echo '</font></td>					
					<td><input type="button" class=\'btn_2\' name="check" value="';echo $STR_Switch;;echo '" onClick="javascript:switchims();"></td>
				</tr>
                <tr>
					<td><font face="Arial" color="white" size="2">';echo $STR_ForceFlashFM;;echo '</font></td>
					<td> </td>					
					<td><input type="button" class=\'btn_2\' name="check" value="';echo $STR_Apply;;echo '" onClick="javascript:forceflash();"></td>
				</tr>				
			</table>
    </form>



<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>
<div id="loadDiv" name="loadDiv" style="position:absolute; visibility:hidden; left:340;top:190;width:200; height:100; z-index:1;">
	<table cellspacing="0" cellpadding="0" border="0" width=100% height=100%>
		<td valign=middle align=center>
			<table borde=0 align=center>
				<td align=center>			
					<img src="dlf/upload.gif">
				</td>
			</table>
		</td>
	</table>
</div>



</body>
</html>
';?>