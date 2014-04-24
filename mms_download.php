<?php
 
$file_name = "files/mylist.xml";
$file = fopen($file_name,"r");
Header("Content-type: application/octet-stream");
Header("Accept-Ranges: bytes");
Header("Accept-Length: ".filesize($file_name));
Header("Content-Disposition: attachment; filename=".$file_name);
echo fread($file,filesize($file_name));
fclose($file);
exit();
?>