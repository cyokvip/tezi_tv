<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include '/tmp/lang.php';
$ftpport = $_POST['ftpport'];
$error = null;
if ($ftpport == null ||$ftpport == ''){
$error = $STR_ValidPort .'<br>';
}
else{
$filename = "/opt/etc/vsftpd.conf";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$i = 0;
while ($i <= 10) {
$dataPair = explode('=',$line[$i]);
if ($dataPair[0] == 'listen_port') {
$dataPair[1] = $ftpport;
$data = $data.$dataPair[0].'='.$dataPair[1]."\n";
}else{
$data = $data.$dataPair[0].'='.$dataPair[1]."\n";
}
$i++;
}
}
;echo '  <html>
  <head>
  <title>FTPPort</title>
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
$file = fopen("/opt/etc/vsftpd.conf","w");
if (fwrite($file,$data)) {
exec('killall vsftpd > /dev/null &');
sleep(3);
exec('/opt/sbin/vsftpd > /dev/null &');
echo "<script>alert('$STR_FTPPortChangeSuccess');</script>";
}else{
;echo '        <tr><td></td><td><font color="white">
  ';
echo "<script>alert('$STR_UnknownError');</script>";
}
fclose($file);
;echo '</body>
</html>';?>