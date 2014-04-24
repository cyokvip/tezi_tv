<?php

header('Content-Type: text/html; charset=utf-8');
include '/tmp/lang.php';
$download_dir = $_POST['download_dir'];
$error = null;
$filename1 = "/opt/etc/init.d/S60aria2";
$filename2 = "/opt/etc/init.d/S50transmission";
$fp1 = fopen($filename1,'r');
$fp2 = fopen($filename2,'r');
$fileData1 = fread($fp1,filesize($filename1));
$fileData2 = fread($fp2,filesize($filename2));
fclose($fp1);
fclose($fp2);
$line1 = explode("\n",$fileData1);
$line2 = explode("\n",$fileData2);
$line1[1] = 'DOWNDIR="'.$download_dir.'"';
$line2[1] = 'DOWNDIR="'.$download_dir.'"';
$i = 0;
while ($i <= 5) {
$data1 = $data1.$line1[$i]."\n";
$data2 = $data2.$line2[$i]."\n";
$i++;
}
exec('killall transmission-daemon > /dev/null &');
exec('killall aria2c > /dev/null &');
sleep(1);
$fp1 = fopen($filename1,'w');
$fp2 = fopen($filename2,'w');
fwrite($fp1,$data1);
fwrite($fp2,$data2);
fclose($fp1);
fclose($fp2);
exec('/opt/etc/init.d/S50transmission > /dev/null &');
exec('/opt/etc/init.d/S60aria2 > /dev/null &');
sleep(1);
echo "<script>alert('$STR_DirChanged');</script>";
echo "<script>parent.document.location.href='setup_transmission.php'</script>";
?>