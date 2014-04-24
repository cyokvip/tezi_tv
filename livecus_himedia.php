<?php
require_once('config.php');
?>
<?php
 
error_reporting(0);
include '/tmp/lang.php';
$content=file_get_contents("files/mylist.xml");
preg_match_all('/<videoname>(.*?)<\/videoname>/',$content,$titles);
preg_match_all('/<link>(.*?)<\/link>/',$content,$links);
$str="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$str .= "<tvlist label=\"HDP DIY\">\n";
for ($i=0;$i<count($titles[1]);$i++){
$str .= "<tv>\n";
$str .= "<channelid>HDP".$i."</channelid>\n";
$str .= "<name>".$titles[1][$i]."</name>\n";
$str .= "<url tvsource=\"web\"><![CDATA[".preg_replace('/&amp;/','&',$links[1][$i])."]]></url>\n";
$str .= "</tv>\n";
}
$str .= "</tvlist>\n";
$file = fopen("/data/Diytvlist/tvlist1.xml","w");
fwrite($file,$str);
fclose($file);
echo "<script>alert('$STR_LiveCus_Complete');</script>";
echo "<script>parent.document.location.href='setup_mms.php'</script>";
?>