<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include '/tmp/lang.php';
$filename = "/opt/etc/inadyn.conf";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$i = 0;
while ($i <= 5) {
$dataPair = explode(' ',$line[$i]);
if ($dataPair[0] == '--username'){
$username = $dataPair[1];
}else if ($dataPair[0] == '--password'){
$password = $dataPair[1];
}else if ($dataPair[0] == 'alias'){
$domain = $dataPair[1];
}
$i++;
}
$filename = "/opt/etc/ipkg.conf";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$i = 0;
while ($i <= 5) {
$dataPair = explode(' ',$line[$i]);
if ($dataPair[1] == 'optware'){
$ipkgsource = $dataPair[2];
}
$i++;
}
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">

<script language="javascript">

function optinstall(software){
        loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.software.target = \'gframe\';
		document.software.action = \'opt_install.php?item=\'+software;
		document.software.submit();
}

function optuninstall(software){
        loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.software.target = \'gframe\';
		document.software.action = \'opt_uninstall.php?item=\'+software;
		document.software.submit();
}

function optstoprun(software){
        loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.software.target = \'gframe\';
		document.software.action = \'opt_stop_run.php?item=\'+software;
		document.software.submit();
}

function optstartrun(software){
        loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.software.target = \'gframe\';
		document.software.action = \'opt_start_run.php?item=\'+software;
		document.software.submit();
}

function optstopboot(software){
        loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.software.target = \'gframe\';
		document.software.action = \'opt_stop_boot.php?item=\'+software;
		document.software.submit();
}

function optstartboot(software){
        loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.software.target = \'gframe\';
		document.software.action = \'opt_start_boot.php?item=\'+software;
		document.software.submit();
}

function changesource(ipksource){
		//alert(ipksource);
        loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.software.target = \'gframe\';
		document.software.action = \'change_ipkg_source.php?item=\'+ipksource;
		document.software.submit();
}



function newwindow(w,h,webaddressname){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>


';
function is_install($software,$software_name,$url){
include '/tmp/lang.php';
$arr_result[]=array();
$arr_result['isinstall']=$STR_NotInstalled;
$arr_result['bootstatus']=$STR_Disabled;
$arr_result['runstatus']=$STR_Stopped;
$dir = "/opt/etc/init.d";
$handle = @opendir($dir) or die("Cannot open ".$dir);
while($file = readdir($handle)){
if($file != "."&&$file != ".."){
if(strpos($file,$software)){
$arr_result['isinstall']=$STR_Installed;
if(substr($file,0,1)=="S"){
$arr_result['bootstatus']=$STR_Enabled;
}else{
$arr_result['bootstatus']=$STR_Disabled;
}
$command="ps | grep ".$software." | wc -l";
$processnumber=exec($command);
if($processnumber >2){
$arr_result['runstatus']=$STR_Running;
}
}
}
}
closedir($handle);
$arr_result['tr'] = "<tr>\n<td><font face=\"arial\" color=\"white\" size=\"2\"><a href=$url target=_blank> <b> <u>$software_name </u></b></font></td>\n";
if($arr_result['isinstall']==$STR_Installed){
$arr_result['tr'] .= "<td><font face=\"arial\" color=\"lawngreen\" size=\"2\"><b>".$arr_result['isinstall']."</b></font></td>\n<td><input type=\"button\" class=\"btn_2\" name=\"uninstall\" value=\"".$STR_UnInstall."\" onClick=\"javascript:optuninstall('$software');\"></td>\n";
}else{
$arr_result['tr'] .= "<td><font face=\"arial\" color=\"red\" size=\"2\"><b>".$arr_result['isinstall']."</b></font></td>\n<td><input type=\"button\" class=\"btn_2\" name=\"install\" value=\"".$STR_Install."\" onClick=\"javascript:optinstall('$software');\"></td>\n";
}
if($arr_result['bootstatus']==$STR_Enabled){
$arr_result['tr'] .= "<td><font face=\"arial\" color=\"lawngreen\" size=\"2\"><b>".$arr_result['bootstatus']."</b></font></td>\n<td><input type=\"button\" class=\"btn_2\" name=\"stopboot\" value=\"".$STR_Stop."\" onClick=\"javascript:optstopboot('$software');\"></td>\n";
}else{
$arr_result['tr'] .= "<td><font face=\"arial\" color=\"red\" size=\"2\"><b>".$arr_result['bootstatus']."</b></font></td>\n<td><input type=\"button\" class=\"btn_2\" name=\"startboot\" value=\"".$STR_Start."\" onClick=\"javascript:optstartboot('$software');\"></td>\n";
}
if($arr_result['runstatus']==$STR_Running){
$arr_result['tr'] .= "<td><font face=\"arial\" color=\"lawngreen\" size=\"2\"><b>".$arr_result['runstatus']."</b></font></td>\n<td><input type=\"button\" class=\"btn_2\" name=\"stoprun\" value=\"".$STR_Stop."\" onClick=\"javascript:optstoprun('$software');\"></td>\n";
}else{
$arr_result['tr'] .= "<td><font face=\"arial\" color=\"red\" size=\"2\"><b>".$arr_result['runstatus']."</b></font></td>\n<td><input type=\"button\" class=\"btn_2\" name=\"startrun\" value=\"".$STR_Start."\" onClick=\"javascript:optstartrun('$software');\"></td>\n";
}
$arr_result['tr'] .= "</tr>\n";
return $arr_result;
}
;echo '

<form name="software" method="post" >
	
	<tr><td align="right"><font face="Arial" color="white" size="2"> ';echo $STR_OptwareExplain;;echo ' </td> </tr>
	<table cellspacing="0" cellpadding="0" border="0">
	<tr><td height=30 width=50></td><td></td></tr>
	
	
	<!-- <tr><td align="right"><font face="Arial" color="white" size="2">IPKG source:&nbsp;</font></td>
		<td><input type="text" name="ipkgsource" class="textbox" size="53" maxlength="100" value="';echo $ipkgsource;;echo '">&nbsp;&nbsp;<input type="button" class=\'btn_2\' name="apply" value="';echo $STR_Apply;;echo '" onClick="javascript:changesource(ipkgsource.value)"></td>
	</tr> -->

	<tr><td width=50></td>
		<td>
			<table border="1" >
				<tr>
			    <td><font face="arial" color="white" size="2"><b>';echo $STR_SoftwareName ;echo '</b></font></td>
			    <td colspan="2"><font face="arial" color="white" size="2"><b>';echo $STR_InstallStatus ;echo '</b></font></td>
				 <td colspan="2"><font face="arial" color="white" size="2"><b>';echo $STR_BootStatus ;echo '</b></font></td>
			    <td colspan="2"><font face="arial" color="white" size="2"><b>';echo $STR_RunStatus ;echo '</b></font></td>
			   
			  </tr>
';
$ddnsprocess=exec("ps|grep inadyn|wc -l");
if ($ddnsprocess >2)
{
$url='http://'.$domain;
}else
{
$url='http://'.$_SERVER["SERVER_ADDR"];
}
$arr_soft=is_install('vsftpd','Vsftpd','#');
echo $arr_soft['tr'];
$arr_soft=is_install('inadyn','DDNS','#');
echo $arr_soft['tr'];
$arr_soft=is_install('transmission','Transmission',$url.':9091');
echo $arr_soft['tr'];
$arr_soft=is_install('mlnet','Mldonkey',$url.':4080');
echo $arr_soft['tr'];
$arr_soft=is_install('unfsd','NFS Server','#');
echo $arr_soft['tr'];
;echo '			</table>
	</td>
	</tr>
	</table>
</form>



<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>
<div id="loadDiv" name="loadDiv" style="position:absolute; visibility:hidden; left:20;top:20;width:200; height:100; z-index:1;">
	<table cellspacing="0" cellpadding="0" border="0" width=100% height=100%>
		<td valign=middle align=center>
			<table borde=0 align=center>
				<td align=center>			
					<img src="images/loading.gif">
				</td>
			</table>
		</td>
	</table>
</div>


</body>
</html>
';?>