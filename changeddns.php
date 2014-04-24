<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
include '/tmp/lang.php';
$username = $_POST['username'];
$password = $_POST['password'];
$domain = $_POST['domain'];
$error = null;
$filename = "/opt/etc/inadyn.conf";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$i = 0;
while ($i <= 5) {
$dataPair = explode(' ',$line[$i]);
if ($dataPair[0] == '--username'){
$data = $data.'--username '.$username."\n";
}else if ($dataPair[0] == '--password'){
$data = $data.'--password '.$password."\n";
}else if ($dataPair[0] == 'update_period'){
$data = $data.'update_period 600'."\n";
}else if ($dataPair[0] == 'alias'){
$data = $data.'alias '.$domain."\n";
}
else if ($dataPair[0] == 'dyndns_system'){
$data = $data.'dyndns_system '.'dyndns@dyndns.org'."\n";
}
$i++;
}
$file = fopen("/opt/etc/inadyn.conf","w");
if (fwrite($file,$data)){
echo "<script>alert('$STR_DDNSChanged');</script>";
echo "<script>parent.document.location.href='setup_ddns.php'</script>";
}else{
echo "<script>alert('$STR_UnknownError');</script>";
}
?>