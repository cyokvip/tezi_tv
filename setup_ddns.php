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
$file = fopen("/etc/hostname",'r');
$hostname = fread($file,filesize("/etc/hostname"));
fclose($file);
$ddnsprocess=exec("ps|grep inadyn|wc -l");
if ($ddnsprocess >2)
{$ddnsstatus=$STR_DDNSStarted;
$statuscolor='lawngreen';}
else {$ddnsstatus=$STR_DDNSStopped;
$statuscolor='red';}
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">

<script language="javascript">

function changeddns(){

	if(!document.ddns.username.value || !document.ddns.password.value || !document.ddns.domain.value){
		alert(\'';echo $STR_SpecifyDDNS;;echo '\');
		document.ddns.ddns.focus();
	}else if(confirm(\'';echo $STR_ChangeDDNS;;echo '\')){
		loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.ddns.target = \'gframe\';
		document.ddns.action = \'changeddns.php\';
		document.ddns.submit();
	}
}

function startddns(){
		document.ddns.target = \'gframe\';
		document.ddns.action = \'start_ddns.php\';
		document.ddns.submit();
	
}

function stopddns(){	
		document.ddns.target = \'gframe\';
		document.ddns.action = \'stop_ddns.php\';
		document.ddns.submit();	
}

function newwindow(w,h,webaddressname){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>

		<form name="ddns" method="post" action=\'javascript:changeddns();\'>
			<table border="0" >
				<tr>
					<td colspan="2">';echo $STR_DDNSIntroduce;;echo ' <a href=';echo $STR_DDNSIntroduceURL;;echo ' target="_blank">';echo $STR_DDNSIntroduceURL;;echo '</a></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td >';echo $STR_DDNS_Username;;echo '</td>
					<td><input type="text" name="username"  size="16" maxlength="16" value="';echo $username;;echo '"></td>
				</tr>
				<tr>
					<td >';echo $STR_DDNS_Password;;echo '</td>
					<td><input type="password" name="password" size="16" maxlength="16" value="';echo $password;;echo '"></td>
				</tr>
				<tr>
					<td >';echo $STR_DDNS_Domain;;echo '</td>
					<td><input type="text" name="domain" size="30" maxlength="30" value="';echo $domain;;echo '">&nbsp;&nbsp;<input type="button" name="add" value="';echo $STR_Apply;;echo '" onClick="javascript:changeddns();"></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td >';echo $STR_DDNS;;echo '</td> <td> <font face="Arial" color="';echo $statuscolor;;echo '">';echo $ddnsstatus;;echo '</font></td>
				</tr>
				<tr> <td></td><td><input type="button" name="add" value="';echo $STR_Start;;echo '" onClick="javascript:startddns();">&nbsp;&nbsp;<input type="button" name="add" value="';echo $STR_Stop;;echo '" onClick="javascript:stopddns();"> </td></tr>
			</table>
    </form>
		

<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>
<div id="loadDiv" name="loadDiv" style="position:absolute; visibility:hidden; left:340;top:190;width:200; height:100; z-index:1;">
	<table cellspacing="0" cellpadding="0" border="0" width=100% height=100%>
		<td valign=middle align=center>
			<table borde=0 align=center>
				<td align=center>			
					<img src="images/loading.gif">
				</td>
			</table>
		</td>
	</table>
</div>


</body>
</html>
';?>