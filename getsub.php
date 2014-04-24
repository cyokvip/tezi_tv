<?php
echo '﻿';
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include '/tmp/lang.php';
$dir = $_GET['dir'];
$file = $_GET['file'];
if (substr($_GET['dir'],1,3)== 'HDD'){
$mediapath = "/tmp/hdd/volumes".$_GET['dir'];;
}else{
$mediapath = "/tmp/usbmounts".$_GET['dir'];;
}
echo $STR_sub_downloading;
if (!file_exists("//usr/local/etc/dvdplayer/xslt-tr")) 
{
exec("wget http://ims.gwmba.com/webcontrol/optware/xslt-tr.bin -O /usr/local/etc/dvdplayer/xslt-tr");
exec("chmod +x /usr/local/etc/dvdplayer/xslt-tr");
}
$cmd='cd "'.$mediapath.'";/usr/local/etc/dvdplayer/xslt-tr "'.$file.'"';
exec($cmd);
$newstr = substr($file,0,strlen($file)-3)."srt";
$cmd='cd "'.$mediapath.'";rm svp*;mv moive.srt "'.$newstr.'"';
exec($cmd);
if (file_exists($mediapath."/".$newstr))
{
echo $STR_subok;
}else
{
echo $STR_subbad;
}
?>