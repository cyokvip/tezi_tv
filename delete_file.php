<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include '/tmp/lang.php';
if (substr($_GET['dir'],1,3)== 'HDD'){
$mediapath = "/tmp/hdd/volumes".$_GET['dir'];;
}else{
$mediapath = "/tmp/usbmounts".$_GET['dir'];;
}
$filename = $_POST['filelist'];
$dir = $_GET['dir'];
$countdata = count($filename);
for ($i=0;$i<$countdata;$i++){
$filename[$i] = stripslashes($filename[$i]);
}
function deleteDir($dir) {
$dhandle = opendir($dir);
if ($dhandle) {
while (false !== ($fname = readdir($dhandle))) {
if (is_dir( "{$dir}/{$fname}")) {
if (($fname != '.') &&($fname != '..')) {
deleteDir("$dir/$fname");
}
}else {
unlink("{$dir}/{$fname}");
}
}
closedir($dhandle);
}
rmdir($dir);
}
if($countdata == 0){
echo "<script>alert('$STR_NoFileToDel');</script>";
}else{
for ($i=0;$i<$countdata;$i++){
if (!is_dir($mediapath ."/".$filename[$i])){
unlink($mediapath ."/".$filename[$i]);
}else{
deleteDir($mediapath ."/".$filename[$i]);
}
}
echo "<script>parent.document.location.href = 'delete.php?dir=$dir';</script>";
}
?>