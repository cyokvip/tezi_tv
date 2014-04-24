<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include '/tmp/lang.php';
$data = $_POST['mylist'];
$dir = $_GET['dir'];
$filename = "/usr/local/etc/dvdplayer/nfs";
if (file_exists($filename)) {
$fp = fopen($filename,'r');
if (filesize($filename)>0){
$fileData = fread($fp,filesize($filename));
}
fclose($fp);
}
$line = explode("\n",$fileData);
$countdata = count($data);
$countline = count($line);
$file = "/usr/local/etc/dvdplayer/share.list";
if (file_exists($file)) {
$tmpfile = fopen($file,'r');
if (filesize($file)>0){
$tmpfileData = fread($tmpfile,filesize($file));
}
fclose($tmpfile);
}
$tmpline = explode("\n",$tmpfileData);
$counttmpline = count($tmpline);
for ($i=0;$i<$countdata;$i++){
$data[$i] = stripslashes($data[$i]);
for ($j=0;$j<$countline;$j++){
$line1 = explode("#",$line[$j]);
if ($data[$i] == $line1[1]){
$dataset = explode("->",$line1[1]);
$l_mount = str_replace("/tmp/ramfs/volumes/nfs/","",$dataset[0]);
$r_mount = explode(":",$dataset[1]);
$command = "umount -f '/tmp/ramfs/volumes/nfs/".$l_mount."(".$r_mount[0].").NFS'";
exec($command,$output,$result);
$delfile = "'/usr/local/etc/dvdplayer/NetShareSave/".$l_mount."(".$r_mount[0].").NFS'";
exec("rm ".$delfile);
$name = $l_mount."(".$r_mount[0].").NFS";
for ($k=$counttmpline;$k>0;$k--){
if ($name == $tmpline[$k]){
unset($tmpline[$k]);
break;
}
}
unset($line[$j]);
}
}
}
$nfsfile = fopen($filename,"w");
for ($j=0;$j<$countline;$j++){
if ($line[$j] != "")
fwrite($nfsfile,$line[$j]."\n");
}
fclose($nfsfile);
$tmpfile = fopen($file,"w");
for ($k=0;$k<$counttmpline;$k++){
if ($tmpline[$k] != "")
fwrite($tmpfile,$tmpline[$k]."\n");
}
fclose($tmpfile);
;echo '<script language=javascript>
	parent.document.location.href = \'setup_nfs.php\';
</script>';?>