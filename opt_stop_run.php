<?php

error_reporting(0);
include '/tmp/lang.php';
$software=$_GET['item'];
if ($software=="transmission"){
$software=$software."-daemon";
}
$command="killall ".$software;
exec($command);
sleep(4);
echo "<script>parent.document.location.href='setup_software.php'</script>";
?>