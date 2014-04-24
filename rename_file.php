<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include '/tmp/lang.php';
$dir = $_GET['dir'];
$newname = $dir ."/".$_POST['new_name'];
$oldname = $dir ."/".$_POST['old_name'];
if(rename($oldname,$newname)){
echo "<script>alert('$STR_RenameSuccess');</script>";
echo "<script>parent.parent.window.location.reload();</script>";
break;
}else{
echo "<script>alert('$STR_EnterValidName');</script>";
break;
}
?>