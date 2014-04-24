<?php
 header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include '/tmp/lang.php';
;echo '<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">
<div>
		 <a href="hdplayerinfo.php?item=cpu" class="title">';echo $STR_CPU;;echo '</a>&nbsp;
		 <a href="hdplayerinfo.php?item=mem" class="title">';echo $STR_MEM;;echo '</a>&nbsp;
		 <a href="hdplayerinfo.php?item=disk" class="title">';echo $STR_DISK;;echo '</a>
</div>
';
$item = $_GET['item'];
if ($item=='mem') {
echo "<pre>";
system ("cat /proc/meminfo | head -n 13");
echo "</pre>";
}
elseif ($item=='disk') {
echo "<pre>";
system ("df -h");
echo "</pre>";
}
else {
echo "<pre>";
system ("cat /proc/cpuinfo");
echo "</pre>";
}
;echo '</body>
</html>


';?>