<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
if (substr($_GET['dir'],1,3)== 'HDD'){
$file= "/tmp/hdd/volumes".stripslashes($_GET['dir']) ."/".stripslashes($_GET['file']);
}else{
$file= "/tmp/usbmounts".stripslashes($_GET['dir']) ."/".stripslashes($_GET['file']);
}
if (substr($_GET['dir'],1,3)== 'HDD'){
$name="/tmp/hdd/volumes".stripslashes($_GET['dir']) ."/".stripslashes($_GET['file']);
}else{
$name="/tmp/usbmounts".stripslashes($_GET['dir']) ."/".stripslashes($_GET['file']);
}
if(ini_get('zlib.output_compression'))
ini_set('zlib.output_compression','Off');
$known_mime_types=array(
"pdf"=>"application/pdf",
"txt"=>"text/plain",
"html"=>"text/html",
"htm"=>"text/html",
"exe"=>"application/octet-stream",
"zip"=>"application/zip",
"doc"=>"application/msword",
"xls"=>"application/vnd.ms-excel",
"ppt"=>"application/vnd.ms-powerpoint",
"gif"=>"image/gif",
"png"=>"image/png",
"jpeg"=>"image/jpg",
"jpg"=>"image/jpg",
"php"=>"text/plain",
"wmv"=>"video/x-ms-wmv",
"avi"=>"video/x-msvideo",
"mp3"=>"audio/mpeg");
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: private",false);
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
if ( strpos($_SERVER['HTTP_USER_AGENT'],'MSIE') ){
header("Content-Disposition: attachment; filename=\"".urlencode(basename($name))."\";");
}else{
header("Content-Disposition: attachment; filename=\"".basename($name)."\";");
}
header("Content-length: ".filesize($name));
header('Content-Type: '.$known_mime_types);
header("Content-Transfer-Encoding: binary");
ob_clean();
flush();
readfile("$file");
exit();
?>