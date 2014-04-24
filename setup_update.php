<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
include "chooselang.php";
include '/tmp/lang.php';
$target_ver=file_get_contents("http://www.hdpfans.com/webversion.txt");
$filename = "version.txt";
$fp = fopen($filename,'r');
$cur_ver = fread($fp,filesize($filename));
fclose($fp);
;echo '
<html>
<head>
<title>';echo $STR_OnlineUpdate;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">

<script language="javascript">
function update(){
		document.updateweb.target = \'gframe\';
		document.updateweb.action = \'update_web.php\';
		document.updateweb.submit();	
}

</script>
        <h2><center>';echo $STR_OnlineUpdateHead;;echo '</center></h2>

			<table border="0" >			     
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td >';echo $STR_CurVersion;;echo '</td>
					<td>';echo $cur_ver;;echo ' </font></td>
				</tr> <br/>
				<tr>
					<form name="updateweb" method="post">
					<td >';echo $STR_LatestVersion;;echo ' </td>
					<td>';echo $target_ver;;echo '						<input type="button" class=\'btn_2\' name="stop" value="';echo $STR_Upgrade;;echo '" onClick="javascript:update();""> </td>
					</form>
				</tr> <br/>				
			</table>
		

<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>
<div id="loadDiv" name="loadDiv" style="position:absolute; visibility:hidden; left:20;top:20;width:200; height:100; z-index:1;">
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