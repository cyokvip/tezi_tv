<?php
require_once('config.php');
?>
<?php
 
error_reporting(0);
include '/tmp/lang.php';
exec('/opt/etc/init.d/S50transmission > /dev/null &');
sleep(3);
echo "<script>alert('$STR_TRStarted');</script>";
echo "<script>parent.document.location.href='setup_transmission.php'</script>";
?>