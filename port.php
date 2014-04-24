<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include '/tmp/lang.php';
$port = $_POST['port'];
$error = null;
$path = "http://".$_ENV["SERVER_ADDR"].':'.$port;
if ($port == null ||$port == ''){
$error = $STR_ValidPort .'<br>';
}
else{
$filename = "/opt/etc/lighttpd/lighttpd.conf";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$line[138] = 'server.port = '.$port;
$i = 0;
while ($i <= 333) {
$data = $data.$line[$i]."\n";
$i++;
}
}
;echo '  <html>
  <head>
  <title>Port</title>
  </head>
  <body bgcolor="black" oncontextmenu="return false;" onLoad="redirect();">
  <center>
  <table cellspacing="0" cellpadding="0" border="0" align="center" height="50" width="500">
        <tr><td></td>
        <td height="155" width="400" align="right" valign="middle"><Img src="dlf/mvix_logo.png" width="300" height="72"></td>
        </tr>
  ';
if ($error) {
;echo '        <tr><td></td><td><font color="white">
  ';
echo $error;
echo '<a href="register_form.php">'.$STR_TryAgain .'</a>.';
exit;
}
$file = fopen("/opt/etc/lighttpd/lighttpd.conf","w");
if (fwrite($file,$data)) {
echo "<script>alert('$STR_ServiceRestart');</script>";
sleep(3);
shell_exec('/data/opt/etc/init.d/S80lighttpd stop');
shell_exec('/data/opt/etc/init.d/S80lighttpd start');
;echo '        <tr><td></td><td><font color="white">
  ';
echo $STR_ServiceRestart ."\n";
echo $STR_AfterReeboot ." <a href=$path>".$path;
}
else{
;echo '        <tr><td></td><td><font color="white">
  ';
echo $STR_UnknownError;
}
fclose($file);
;echo '</body>
</html>
';?>