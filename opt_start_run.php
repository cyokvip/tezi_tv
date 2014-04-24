<?php

error_reporting(0);
include '/tmp/lang.php';
$software=$_GET['item'];
$dir = "/opt/etc/init.d";
$handle = @opendir($dir) or die("Cannot open ".$dir);
while($file = readdir($handle)){
if($file != "."&&$file != ".."){
if(strpos($file,$software)){
$command=$dir."/".$file.">/dev/null 2>&1";
}
}
}
closedir($handle);
if ($software=="transmission"){
if (!file_exists("/tmp/hdd/root/lost+found")){
echo "<script>alert('$STR_HDDNeedFormat');</script>";
}
}
exec($command);
sleep(5);
echo "<script>parent.document.location.href='setup_software.php'</script>";
?>