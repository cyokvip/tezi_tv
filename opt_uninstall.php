<?php

error_reporting(0);
include '/tmp/lang.php';
$software=$_GET['item'];
switch($software){
case "transmission":
$command="killall transmission-daemon;sleep 5";
exec($command);
$command="rm /opt/etc/init.d/S50transmission;rm /opt/etc/init.d/B50transmission";
exec($command);
break;
case "amule":	
$command="killall amuled;sleep 5";
exec($command);
$command="rm /opt/etc/init.d/S57amuled;rm /opt/etc/init.d/B57amuled";
exec($command);
break;
case "mlnet":	
$command="killall mlnet;sleep 5";
exec($command);
$command="rm /opt/etc/init.d/S91mlnet;rm /opt/etc/init.d/B91mlnet";
exec($command);
break;
case "vsftpd":	
$command="killall vsftpd;sleep 3";
exec($command);
$command="rm /opt/etc/init.d/S20vsftpd;rm /opt/etc/init.d/B20vsftpd";
exec($command);
break;
case "inadyn":	
$command="killall inadyn;sleep 3";
exec($command);
$command="rm /opt/etc/init.d/B30inadyn;rm /opt/etc/init.d/S30inadyn";
exec($command);
break;
case "unfsd":	
$command="killall unfsd;killall portmap;sleep 3";
exec($command);
$command="rm /opt/etc/init.d/S56unfsd;rm /opt/etc/init.d/B56unfsd;rm /opt/etc/init.d/S55portmap;rm /opt/etc/init.d/B55portmap";
exec($command);
break;
}
sleep(2);
echo "<script>parent.document.location.href='setup_software.php'</script>";
?>