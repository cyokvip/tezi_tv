<?php
require_once('config.php');
?>
<?php
 
error_reporting(0);
include '/tmp/lang.php';
exec('killall vsftpd > /dev/null &');
rename("/opt/etc/init.d/S20vsftpd","/opt/etc/init.d/B20vsftpd");
sleep(3);
echo "<script>alert('$STR_FTPStopped');</script>";
echo "<script>parent.document.location.href='setup_ftp.php'</script>";
?>