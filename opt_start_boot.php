<?php

error_reporting(0);
include '/tmp/lang.php';
$software=$_GET['item'];
$dir = "/opt/etc/init.d";
$handle = @opendir($dir) or die("Cannot open ".$dir);
while($file = readdir($handle)){
if($file != "."&&$file != ".."){
if(strpos($file,$software)){
$file_to_rename=$file;
}
}
}
closedir($handle);
$new_file_name=substr($file_to_rename,1);
$new_file_name='S'.$new_file_name;
$file_to_rename=$dir.'/'.$file_to_rename;
$new_file_name=$dir.'/'.$new_file_name;
rename($file_to_rename,$new_file_name);
sleep(2);
echo "<script>parent.document.location.href='setup_software.php'</script>";
?>