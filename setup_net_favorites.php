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
$filename = "/usr/local/etc/dvdplayer/account.dat";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$username = $line[0];
$password = $line[1];
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">

<script language="javascript">


function newwindow(w,h,webaddressname){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>

		<form action="http://www.iptv911.com/~index.user.checkLogin" method="post" target="_blank">
			<table border="0" >
			<input type=hidden name=to value=\'http:^^www.iptv911.com^\' />
				<tr>
					<td colspan="2">';echo $STR_net_favorites_intro;;echo ' <a href=';echo $STR_net_favorites_reg_URL;;echo ' target="_blank">';echo $STR_net_favorites_register;echo '</a></td>
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
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>

				<tr> <td></td><td><input type="submit" name="submit" value="';echo $STR_Apply;;echo '"></tr>
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