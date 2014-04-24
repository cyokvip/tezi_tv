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
					<div class="menu">
<a  href="admin.php?tag=status&tar=hdplayerinfo.php"><img src="images/info.png" width="59" height="60" alt=" Info "><br>';echo $STR_SystemStatus;;echo '</a>
          </div>
          <div class="menu">
<a href="downloadpage.php"><img src="images/bt.png" width="59" height="60" alt=" Transmission "><br>';echo $STR_transmission_page;;echo '</a>
          </div>
          <div class="menu">
<a href="admin.php?tag=setup_mms&tar=setup_mms.php"><img src="images/video.png" width="59" height="60" alt=" live "><br>';echo $STR_Live_Cus;;echo '</a>
          </div>
          <div class="menu">
<a href="folder.php?sel=all"><img src="images/all.png" width="59" height="60" alt="folder "><br>';echo $STR_ViewFiles;;echo '</a>
          </div>
      </div>
      <div class="footer">';include 'footer.php';;echo '</div>
</div>
</body>
</html>
';?>