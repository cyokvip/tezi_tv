<?php
require_once('config.php');
?>
<?php

session_start();
error_reporting(0);
include '/tmp/lang.php';
$l_mount = $_POST['lmount'];
$r_mount = $_POST['rmount'];
$m_option = $_POST['opt'];
$l_mount = str_replace(" ","\ ",$l_mount);
$r_mount = str_replace(" ","\ ",$r_mount);
$ip = explode(":",$r_mount);
$data = $l_mount."(".$ip[0].").NFS";
$command = "mkdir -p '/tmp/ramfs/volumes/nfs/".$l_mount."(".$ip[0].").NFS'\nmount -t nfs '".$r_mount ."' '/tmp/ramfs/volumes/nfs/".$l_mount."(".$ip[0].").NFS' -o nolock,".$m_option;
exec("$command",$result,$output);
if($output == 0){
$shortcutfile = "/usr/local/etc/dvdplayer/share.list";
$fp = fopen($shortcutfile,'a');
if ($fp != NULL){
fwrite($fp,$data."\n");
fclose($fp);
}
$filename = "/usr/local/etc/dvdplayer/NetShareSave/".$l_mount."(".$ip[0].").NFS";
$filedata = "#/tmp/ramfs/volumes/nfs/".$l_mount."->".$r_mount." -o ".$m_option."\nmkdir -p '/tmp/ramfs/volumes/nfs/".$l_mount."(".$ip[0].").NFS'\nmount -t nfs '".$r_mount ."' '/tmp/ramfs/volumes/nfs/".$l_mount."(".$ip[0].").NFS' -o nolock,".$m_option;
$fp1 = fopen($filename,'w');
if ($fp1 != NULL){
fwrite($fp1,$filedata);
fclose($fp1);
}
chmod($filename,0777);
echo "<script>parent.window.location.href='setup_nfs.php'; </script>";
}else{
echo "<script>alert('$STR_mount_failed');</script>";
echo "<script>loadDivEl = parent.document.getElementById('loadDiv');
					loadDivEl.style.visibility = 'hidden';</script>";
}
?>