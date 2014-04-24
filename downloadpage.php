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
;echo '

<html>
<head>
<title>';echo $STR_Title;;echo '</title>
<!-- Use IE7 mode --> 
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script language="JavaScript">
function newwindow(w,h,webaddress,name){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}

<!--
	var jsRes = "PC1024";
	if (window.screen.width >= 1024)
		jsRes = "PC1024";
	if (jsRes != "PC1024")
		window.location="/?bRes=" + jsRes + "&rU=%2Fapp%2Fplayer%2Fwelcome%2Faction%2Fwelcome.php";
-->
</script>

<link href="includes/style.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">
<div class="content">
      <div class="indextop"></div>
      <div class="mid">
		<table>
		<br/>
		<br/>
		<br/>
		<tr>
		<td width="100"><img src="images/aria2.png" width="60" height="60" alt="Aria2"></img></td>
		<td width="350"><a href="';echo "http://".$_SERVER["SERVER_ADDR"]."/aria2";echo '">Aria2 - 用于网页下载和迅雷离线 - 点击进入</a></td>
		<td width="150"><a href="http://www.hdpfans.com/thread-437432-1-1.html" target="_blank">使用教程</a></td>
		</tr>
		<tr>
		<td width="100"><img src="images/transmission.png" width="60" height="60" alt="Transmission"> </img></td>
		<td width="350"><a href="';echo "http://".$_SERVER["SERVER_ADDR"].":9091";echo '">Transmission - 用于挂BT/PT下载 - 点击进入</a></td>
		<td width="150"><a href="http://www.hdpfans.com/thread-437430-1-1.html" target="_blank">使用教程</a></td>
		</tr>
		</table>
      </div>
      <div class="footer">';include 'footer.php';;echo '</div>
</div>
</body>
</html>
';?>