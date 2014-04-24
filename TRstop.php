<?php
require_once('config.php');
?>
<?php
 
error_reporting(0);
include '/tmp/lang.php';
exec('killall transmission-daemon > /dev/null &');
sleep(3);
echo "<script>alert('$STR_TRStopped');</script>";
echo "<script>parent.document.location.href='setup_transmission.php'</script>";
?>