<?php
require_once('config.php');
?>
<?php
 
error_reporting(0);
include '/tmp/lang.php';
rename("/opt/etc/init.d/B20vsftpd","/opt/etc/init.d/S20vsftpd");
exec('/opt/sbin/vsftpd > /dev/null &');
sleep(3);
echo "<script>alert('$STR_FTPStarted');</script>";
echo "<script>parent.document.location.href='setup_ftp.php'</script>";
?>