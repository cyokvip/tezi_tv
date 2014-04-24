<?php
 
include '/tmp/lang.php';
$target_ver=file_get_contents("http://www.hdpfans.com/webversion.txt");
$fp = fopen("version.txt",'w');
fwrite($fp,$target_ver);
fclose($fp);
echo "<script>alert('$STR_UpdateDone');</script>";
echo "<script>parent.document.location.href='setup_update.php'</script>";
exec("wget http://www.hdpfans.com/webcontrol/web.tar -O /opt/share/web.tar");
exec("tar xf /opt/share/web.tar -C /opt/share/www");
exec("rm /opt/share/web.tar");
echo "<script>alert('$STR_UpdateDone');</script>";
echo "<script>parent.document.location.href='setup_update.php'</script>";
?>