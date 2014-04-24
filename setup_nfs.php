<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include '/tmp/lang.php';
$HDDInfo = shell_exec("df -h|grep /dev/scsi/host0/bus0/target0/lun0/part1");
sscanf($HDDInfo,"%s %s %s %s",$aaa,$HDDTotal,$HDDUsed,$HDDFree);
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;">

<script language="javascript">
function local_nfs_change(){
	if (!document.nfs.lmount.value){
		alert(\'';echo $STR_select_lmount;;echo '\');
	}else if (!document.nfs.rmount.value){
		alert(\'';echo $STR_select_rmount;;echo '\');
	}else if (!document.nfs.opt.value){
		alert(\'';echo $STR_select_option;;echo '\');
	}else{
		loadDivEl = document.getElementById("loadDiv");
		loadDivEl.style.visibility = \'visible\';
		document.nfs.target = \'gframe\';
		document.nfs.action = \'nfs_local.php\';
		document.nfs.submit();
	}
}

function delmont(){
	flg = 0;
	for(i=0;i<document.unmount.length;i++){
		if(document.unmount[i].checked == true){
			flg = 1;
			break;
		}else{
			flg = 0;
		}
	}

	if(flg == 0){
		alert("';echo $STR_No_item_selected;;echo '");
		return false;
	}
	if(confirm(\'';echo $STR_ReallyDelete;;echo '\')){
		document.unmount.target = \'gframe\';
		document.unmount.action = \'NFS_delete.php\';
		document.unmount.submit();
	}
}

function newwindow(w,h,webaddress,name){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>


	<form name="unmount" action="javascript:delmont()" method="post">
	<div style=\'width: 540; height: 125; overflow: auto; border: 1px solid #ffffff; background: transparent ;\'>
	';
exec("grep '#' /usr/local/etc/NetShareSave/* > /usr/local/etc/nfs");
$filename = "/usr/local/etc/nfs";
if (file_exists($filename)) {
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
}
$line = explode("\n",$fileData);
$count = count($line);
for ($i=0;$i<$count-1;$i++){
$line1 = explode("#",$line[$i]);
echo '<table width=750 cellspacing="0" cellpadding="0" border="0" >';
echo "<tr> <td>";
if($line[$i] != ""){
echo "<input type='checkbox' name='mylist[]' value='$line1[1]'>";
echo "<font color='white' face='Arial' size='2'>";
echo $line1[1];
}
echo "</td></tr></table>";
}
;echo '    </div>
    <div>	
	<tr><td align="right"><input type="button" class=\'btn_2\' name="del" value="';echo $STR_Delete;;echo '" onClick="javascript:delmont();"></td></tr>
	</div>
	</form>
	
	
	<tr><td width=0></td>
		<td>
		<form name="nfs" action="javascript:local_nfs_change()" method="post">
			<table border="0">
			  <!--tr><td></td>
			  <td><input type="text" name="l_mount" class="textbox" size="50" style="display: none;" value="';echo $_SESSION['NFS'];;echo '"><br></td></tr>
			  <tr><td width="130"><font face="Arial" color="white" size="2">';echo $STR_Local_Mount;;echo '</td>
			  <td><input type="text" name="lmount" class="textbox" size="50" disabled="yes" value="';echo $_SESSION['NFS_show'];;echo '"><br></td>
			  <td><input type="button" class=\'btn_2\' name="apply" value="Browse" onClick="window.open(\'NFS_dir.php\',\'directory\',\'height=630,width=550,left=220,top=50\');"></td></tr-->
			  <tr height=5></tr>
			  <tr><td width="130"><font face="Arial" color="white" size="2">';echo $STR_Local_Mount;;echo ' </td>			  
			  <td><input type="text" name="lmount" class="textbox" size="50"><br></td>
			  <tr><td></td><td><font face="Arial" color="white" size="2">e.g. dir1,dir2...</td></tr>
			  <tr><td width="130"><font face="Arial" color="white" size="2">';echo $STR_Remote_Mount;;echo '</td>
			  <td><input type="text" name="rmount" class="textbox" size="50"><br></td></tr>
			  <tr><td></td><td><font face="Arial" color="white" size="2">e.g. 192.168.0.1:/video</td></tr>
			  <tr><td width="130"><font face="Arial" color="white" size="2">';echo $STR_Options;;echo ' &nbsp&nbsp&nbsp&nbsp&nbsp -o</td>
			  <td><input type="text" name="opt" class="textbox" size="50" value ="rsize=32768,wsize=32768,tcp"><br></td></tr>
			  <!-- <tr><td></td><td><font face="Arial" color="white" size="2">rsize=32768,wsize=32768,tcp</td></tr> -->
			  <tr><td height="5"></td></tr>
			  <tr><td></td><td><input type="button" class=\'btn_2\' name="apply" value="';echo $STR_Apply;;echo '" onClick="javascript:local_nfs_change();"></td></tr>
			</table>
		</form>
	

<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>
<div id="loadDiv" name="loadDiv" style="position:absolute; visibility:hidden; left:340;top:190;width:200; height:100; z-index:1;">
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