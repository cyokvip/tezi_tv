<?php
 
error_reporting(0);
include '/tmp/lang.php';
$content=file_get_contents("files/mylist.xml");
preg_match_all('/<videoname>(.*?)<\/videoname>/',$content,$titles);
preg_match_all('/<link>(.*?)<\/link>/',$content,$links);
for ($i=0;$i<count($titles[1]);$i++){
$str .= preg_replace('/ /','',$titles[1][$i])."|".preg_replace('/&amp;/','&',$links[1][$i])."\n";
}
$file = fopen("/mnt/sdcard/kbr.tv.txt","w");
fwrite($file,$str);
fclose($file);
echo "<script>alert('$STR_LiveCus_Complete');</script>";
echo "<script>parent.document.location.href='setup_mms.php'</script>";
?>