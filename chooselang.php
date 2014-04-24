<?php
require_once('config.php');
?>
<?php

if (file_exists("/usr/local/etc/dvdplayer/setup.txt") == false) {
copy ("setup.txt","/usr/local/etc/dvdplayer/setup.txt");
}
$filename = "/usr/local/etc/dvdplayer/setup.txt";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$i = 0;
while ($i <= 5) {
$dataPair = explode('=',$line[$i]);
if ($dataPair[0] == 'Lang'){
$lang = trim($dataPair[1]);
}
$i++;
}
switch ($lang) {
case "chinese":
copy("chinese.php","/tmp/lang.php");
break;
case "arabic":
copy("arabic.php","/tmp/lang.php");
break;
default:
copy("chinese.php","/tmp/lang.php");
}
?>