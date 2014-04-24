<?php
require_once('config.php');
?>
<?php

error_reporting(0);
include '/tmp/lang.php';
$software=$_GET['item'];
switch($software){
case "transmission":		   
if (file_exists("/opt/bin/transmission-daemon"))
{
$command="wget http://ims.gwmba.com/webcontrol/optware/transmission/S50transmission.txt -O /opt/etc/init.d/S50transmission";
exec($command);
$command="chmod +x /opt/etc/init.d/S50transmission";
exec($command);
}
break;
case "vsftpd":           	
if (file_exists("/opt/sbin/vsftpd"))
{
$command="wget http://ims.gwmba.com/webcontrol/optware/vsftpd/S20vsftpd.txt -O /opt/etc/init.d/S20vsftpd";
exec($command);
$command="chmod +x /opt/etc/init.d/S20vsftpd";
exec($command);
}
break;
case "amuled":	
if (file_exists("/opt/bin/amuled"))
{
$command="wget http://ims.gwmba.com/webcontrol/optware/amule/S57amuled.txt -O /opt/etc/init.d/S57amuled";
exec($command);
$command="chmod +x /opt/etc/init.d/S57amuled";
exec($command);
}
break;
case "mlnet":	
if (file_exists("/opt/bin/mlnet"))
{
$command="wget http://ims.gwmba.com/webcontrol/optware/mlnet/S91mlnet.txt -O /opt/etc/init.d/S91mlnet";
exec($command);
$command="chmod +x /opt/etc/init.d/S91mlnet";
exec($command);
}
break;
case "inadyn":           
if (file_exists("/opt/bin/inadyn"))
{
$command="wget http://ims.gwmba.com/webcontrol/optware/ddns/B30inadyn.txt -O /opt/etc/init.d/B30inadyn";
exec($command);
$command="chmod +x /opt/etc/init.d/B30inadyn";
exec($command);
}
break;
case "unfsd":           	
if (file_exists("/opt/sbin/unfsd"))
{
$command="wget http://ims.gwmba.com/webcontrol/optware/nfs/S55portmap.txt -O /opt/etc/init.d/S55portmap";
exec($command);
$command="wget http://ims.gwmba.com/webcontrol/optware/nfs/S56unfsd.txt -O /opt/etc/init.d/S56unfsd";
exec($command);
$command="chmod +x /opt/etc/init.d/S55portmap /opt/etc/init.d/S56unfsd";
exec($command);
$command="wget http://ims.gwmba.com/webcontrol/optware/nfs/exports.txt -O /opt/etc/exports";
exec($command);
}
}
sleep(2);
echo "<script>parent.document.location.href='setup_software.php'</script>";
?>