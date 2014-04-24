<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include '/tmp/lang.php';
if (move_uploaded_file($_FILES["rss_import"]["tmp_name"],"files/mylist.xml"))
echo '<span style="color:white;">'.$STR_Upload_Ok.'</span>';
else 
echo '<span style="color:white;">'.$STR_Upload_Fail.'</span>';
?>