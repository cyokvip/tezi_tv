<?php
require_once('config.php');
?>
<?php

session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include '/tmp/lang.php';
$location=$_GET['location'];
if ($location=='usb'){
$root = "/";
}else{
$root = "/";
}
$videoTypes = array (
'.wmv',
'.mpg',
'.rm',
'.rmvb',
'.avi',
'.dat',
'.mpeg',
'.divx',
'.xvid',
'.mkv',
'.mov',
'.asf',
'.ts',
'.ogm',
'.mp4',
'.vob',
'.flv',
'.m4v',
'.txt',
'.conf',
'.apk',
'.sh',
'.dat',
);
$photoTypes = array (
'.jpg',
'.jpeg',
'.bmp',
'.gif',
'.png',
'.psd',
'.tif',
);
$audioTypes = array (
'.mp3',
'.wma',
'.wav',
'.mp2',
'.aac',
'.ac3',
'.ogg',
'.dts',
'.flac',
'.m3u',
'.ape',
'.cue',
);
if($_SESSION['listview']==""){
$_SESSION['listview']="all";
}
if($_GET['sel']!=""){
$fileTypes=array();
unset($fileTypes);
$_SESSION['listview']=$_GET['sel'];
}
$nav01="nav_nor";
$nav02="nav_nor";
$nav03="nav_nor";
$nav04="nav_nor";
switch ($_SESSION['listview']){
case "video":
$fileTypes=$videoTypes;
$nav01="nav_cur";
break;
case "audio":
$fileTypes=$audioTypes;
$nav02="nav_cur";
break;
case "photo":
$fileTypes=$photoTypes;
$nav03="nav_cur";
break;
case "all":
$fileTypes=array_merge($videoTypes,$audioTypes,$photoTypes);
$nav04="nav_cur";
break;
}
if ((substr($_GET['dir'],0,2) != '/.') and (substr($_GET['dir'],0,1) != '.') and ($_GET['dir'] != '')) {
$mydir =  $root .$_GET['dir'];
$mediapath =  stripslashes($_GET['dir']);}
else {
$mydir = $root;
}
$uplink = substr_replace($_GET['dir'],'',strlen($_GET['dir'])-strlen(strrchr( $_GET['dir'],'/')));
$files = myscan($mydir);
sort($files);
function myscan($dir) {
$arrfiles = array();
$arrfiles = opendir(stripslashes($dir));
while (false !== ($filename = readdir($arrfiles))) {
$files[] = $filename;
}
return $files;
}
;echo '
<html>
<head>
<title>';echo $STR_Title;;echo '</title>
<!-- Use IE7 mode -->
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="includes/style.css" rel="stylesheet" type="text/css">
<link href="includes/popup.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="includes/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="includes/popup.js"></script>
</head>
<body oncontextmenu="return false;">
<div class="content">
  <div class="top">
  	<!-- 存储介质选择 -->
  	<div class="';if ($location=='usb'){echo "disk_blank2nor";}else{echo "disk_blank2cur";};echo '"></div>
    <div class="';if ($location=='usb'){echo "disk_nor";}else{echo "disk_cur";};echo '"><a href="folder.php?location=hdd">';echo $STR_VideoHDD;;echo '</a></div>
    <div class="';if ($location=='usb'){echo "disk_cur2blank";}else{echo "disk_nor2blank";};echo '"></div>
  </div>
  <div class="nav">
  	<!-- 文件类型选择 -->
    <div class="nav_l"></div>
		<div class="';echo $nav04;;echo '"><a href="folder.php?sel=all&dir=';echo $mediapath;;echo '">';echo $STR_All_title;;echo '</a></div>
    <div class="nav_r"></div>
  </div>
  <div class="mid_folder">
		<ul>
';
if(!$_GET["dir"]==''){
echo '<li id="folder" onmouseover="this.style.background=\'ff6600\';" onmouseout="this.style.background=\'none\';"><a href="'.$_SERVER["PHP_SELF"] .'?location='.$location.'&dir='.$uplink .'"><img src="images/icon_folder.png" align="center">'.$STR_ParentDirectory .'...</a></li>';
}
$mydir = str_replace("(","\(",$mydir);
$mydir = str_replace(")","\)",$mydir);
$command = 'cd '.str_replace(" ","\ ",$mydir).';ls -alh > /tmp/aaa';
shell_exec($command);
$file1 = "/tmp/aaa";
$fp1 = fopen($file1,'r');
$i=0;
while (!feof($fp1)) {
$line1[$i++] = fgets($fp1,4096);
}
fclose($fp1);
for ($x=0;$x<($i-1);$x++) {
if (($files[$x] != '.') and ($files[$x] != "..") and ($files[$x] != "hdd") and ($files[$x] != "Recycled") and ($files[$x] != "System Volume Information") and (substr($files[$x],0,1) != ".") and ($files[$x] != "lost+found")){
if (substr($line1[$x],0,1) == 'd'){
$files1[$x] = $files[$x];
if ($aaa!= ""){
$files1[$x] = str_replace("sda","HDD",$files1[$x]);
$files1[$x] = str_replace("sdb1","USB1",$files1[$x]);
$files1[$x] = str_replace("sdc1","USB2",$files1[$x]);
$files1[$x] = str_replace("sdd1","USB3",$files1[$x]);
$files1[$x] = str_replace("sdb","USB",$files1[$x]);
$files1[$x] = str_replace("sdc","USB",$files1[$x]);
}else{
$files1[$x] = str_replace("sda1","USB1",$files1[$x]);
$files1[$x] = str_replace("sdb1","USB2",$files1[$x]);
$files1[$x] = str_replace("sdc1","USB3",$files1[$x]);
$files1[$x] = str_replace("sdd1","USB4",$files1[$x]);
$files1[$x] = str_replace("sdb","USB",$files1[$x]);
$files1[$x] = str_replace("sdc","USB",$files1[$x]);
}
echo '<li id="folder" onmouseover="this.style.background=\'ff6600\';" onmouseout="this.style.background=\'none\';"><a href="'.$_SERVER['PHP_SELF'] .'?location='.$location.'&dir='.$mediapath .'/'.$files[$x] .'"><img src="images/icon_folder.png" align="center">'.$files1[$x].'</a></li>';
$line1[$x] = NULL;
}
}
}
$row=0;
for ($x=0;$x<($i-1);$x++) {
if($line1[$x] == NULL)
continue;
if (substr($line1[$x],0,1) != 'd'){
if (in_array(strtolower(strrchr($files[$x],'.')),$fileTypes,true))
{
$row++;
$file = "http://".$_SERVER["SERVER_NAME"].'/'."media".$mediapath .'/'.$files[$x];
if(in_array(strtolower(strrchr($files[$x],'.')),$videoTypes,true)) {
$icon = 'icon_video.png';
}
if(in_array(strtolower(strrchr($files[$x],'.')),$photoTypes,true)) {
$icon = 'icon_photo.png';
}
if(in_array(strtolower(strrchr($files[$x],'.')),$audioTypes,true)) {
$icon = 'icon_audio.png';
}
if($row%2!=1){
echo '<li onmouseover="this.style.background=\'ff6600\';" onmouseout="this.style.background=\'333232\';"><span id="filename"><img src="images/'.$icon.'" align="center">&nbsp;';
}else{
echo '<li id="interval" onmouseover="this.style.background=\'ff6600\';" onmouseout="this.style.background=\'434141\';"><span id="filename"><img src="images/'.$icon.'" align="center">&nbsp;';
}
if (strlen($files[$x]) >58) {
echo substr($files[$x],0,58) ."...".'</span>';}
else {
echo $files[$x].'</span>';
}
sscanf($line1[$x],"%s %s %s %s %s %s %s %s",$a,$b,$c,$d,$Size,$mnth,$day,$time);
echo '<span id="filesize">'.$Size.'</span><span id="filedate">'.$mnth.' '.$day.','.$time.'</span>';
echo '<span><a href=\'download.php?dir='.$mediapath.'&file='.$files[$x].'\';><img src="images/icon_download.png" align="center" title="'.$STR_Download.'"></a>';
echo '<a onClick="popup(\''.$STR_sub.'\',\'iframe:getsub.php?dir='.$mediapath.'&file='.$files[$x].'\',\'500\',\'168\',\'false\',\'\',\'true\');"><img src="images/icon_rename.png" align="center" title="'.$STR_sub.'"></a>';
}
}
}
;echo '		</ul>
  </div>
  <div class="folder_footer">
	<div>
	</div>
	';
$mediapath1 = $mediapath;
if ($aaa!= ""){
$mediapath1 = str_replace("sda","HDD",$mediapath1);
$mediapath1 = str_replace("sdb1","USB1",$mediapath1);
$mediapath1 = str_replace("sdc1","USB2",$mediapath1);
$mediapath1 = str_replace("sdd1","USB3",$mediapath1);
$mediapath1 = str_replace("sdb","USB",$mediapath1);
$mediapath1 = str_replace("sdc","USB",$mediapath1);
}else{
$mediapath1 = str_replace("sda1","USB1",$mediapath1);
$mediapath1 = str_replace("sdb1","USB2",$mediapath1);
$mediapath1 = str_replace("sdc1","USB3",$mediapath1);
$mediapath1 = str_replace("sdd1","USB4",$mediapath1);
$mediapath1 = str_replace("sdb","USB",$mediapath1);
$mediapath1 = str_replace("sdc","USB",$mediapath1);
}
if (strlen($mediapath) >90) {
$mediapath1=substr($mediapath,0,90);
}
if ($mediapath != ""&&$aaa!= ""&&$location!="usb"){
echo "<div id='diskinfo'>".$STR_CurrentLocation.": ".$mediapath1."&nbsp;&nbsp;&nbsp;&nbsp;";
echo $STR_HDDUsed.": $HDDUsed&nbsp;&nbsp;".$STR_HDDFree.": $HDDFree&nbsp;&nbsp;".$STR_HDDTotal.": $HDDTotal</div>";
}
;echo '	</div>
  <div class="footer">';include 'footer.php';;echo '</div>
</div>
</body>
</html>
';?>