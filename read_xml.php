<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include 'chiness.php';
$xmls = simplexml_load_file('files/central.xml');
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">

';
$companyName = $xmls->channel->title;
echo $companyName;
echo "<br>";
foreach($xmls->channel->item as $items){
print($items->title);
echo "<br>";
}
;echo '<table border="0" >
		<tr>
					<td><font face="Arial" color="white" size="2">';echo $STR_WebVersionStatus;;echo '</font></td>
					<td width= 150 ><font face="Arial" color="white" size="2">';echo $web_version;;echo '</font></td>
                    <td><input type="button" class=\'btn_2\' name="check" value="';echo $STR_CheckVersion;;echo '" onClick="javascript:checkversion();"></td>					
					<td><input type="button" class=\'btn_2\' name="update" value="';echo $STR_Update;;echo '" onClick="javascript:doupdate();"></td>
				</tr>
               			
</table>
 
</body>
</html>';?>