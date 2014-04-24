<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(1);
include '/tmp/lang.php';
$doc =new DOMDocument();
$doc->load("files/mylist.xml");
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Pragma" content="no-cache">
<link href="includes/popup.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="includes/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="includes/popup.js"></script>
</head>
<body oncontextmenu="return false;">

<script language="javascript">
 
function delmms(){
    flg = 0;
    for(i=0;i<document.mmslist.length;i++){
        if(document.mmslist[i].checked == true){
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
    if(confirm("';echo $STR_ReallyDelete;;echo '")){
        document.mmslist.target = \'gframe\';
        document.mmslist.action = \'mms_delete.php\';
        document.mmslist.submit();
    }
}

function genhimedia(){
	document.himedia.target = \'gframe\';
	document.himedia.action = \'livecus_himedia.php\';
	document.himedia.submit();
}

function gentogic(){
	document.togic.target = \'gframe\';
	document.togic.action = \'livecus_togic.php\';
	document.togic.submit();
}

function genkbr(){
	document.kbr.target = \'gframe\';
	document.kbr.action = \'livecus_kbr.php\';
	document.kbr.submit();
}

function downloadmms(){
        document.download.target = \'gframe\';
        document.download.action = \'mms_download.php\';
        document.download.submit();
}
 
</script>

<table width = "550" height = "10">
 <tr> <td><p align = "center"><b> ';echo $STR_MMS_Tips;echo ' </b></p></td></tr>
 <tr> <td>
 <form name="download" enctype="multipart/form-data" action="mms_download.php" method="post">
 ';echo $STR_Lable_Export ;echo '<input type="button" name="export" value="';echo $STR_Export;;echo '" onclick="javascript:downloadmms();">
</form> 
</td></tr>
 <tr> <td>
 <form name="upload" enctype="multipart/form-data" action="mms_upload.php" method="post">
 ';echo $STR_Lable_Import ;echo '<input type="file" name="rss_import" >
<input type="submit" name="submit" value="';echo $STR_Import;;echo '" />
</form> </td>
</tr>
 <tr> <td> ';echo $STR_GetMoreSource;echo '  <a href ="http://www.hdpfans.com/forum-45-1.html" target ="_blank">http://www.hdpfans.com/forum-45-1.html</a>
 </td></tr>
</table>
<br/>

<form name="mmslist" action="javascript:delmms()" method="post">
<div style=\'width: 550; height: 485; overflow-y:auto ; overflow-x:hidden; border: 1px solid #ffffff; background: transparent ;\'>

';
$items = $doc->getElementsByTagName( "video");
foreach( $items as $item )
{
$title = $item->getElementsByTagName( "videoname");
$mms_name = $title->item(0)->nodeValue;
$link = $item->getElementsByTagName( "link");
$mms_address = $link->item(0)->nodeValue;
$line=$mms_name." -> ".$mms_address;
echo '<table width=800 cellspacing="0" cellpadding="0" border="0" >';
echo "<tr> <td>";
echo "<input type='checkbox' name='mylist[]' value='$line'>";
echo "<font color='white' face='Arial' size='2'>";
echo $line;
echo "<a href='".$mms_address."' target = '_blank'>".$STR_TestThisUrl."</a>";
echo "</td></tr></table>";
}
;echo '</div>

<div width="550" align = "justify">
<input type="button" style="height:26px; line-height:26px" name="additem" value="';echo $STR_Add;;echo '" onClick="popup(\'';echo $STR_AddVideo;;echo '\',\'iframe:mms_popup_add.php\', \'500\',\'200\',\'false\',\'\',\'true\');">	
<input type="button" style="height:26px; line-height:26px" name="del" value="';echo $STR_Remove;;echo '" onClick="javascript:delmms();">
</form>
</div>

<div width="550" align = "justify">
<form name="himedia" action="javascript:genhimedia()" method="post">
<input type="button" style="height:26px; line-height:26px" name="himedia" value="';echo $STR_LiveCus_Himedia;;echo '" onClick="javascript:genhimedia();">
</form>
</div>

<div width="550" align = "justify">
<form name="togic" action="javascript:gentogic()" method="post">
<input type="button" style="height:26px; line-height:26px" name="togic" value="';echo $STR_LiveCus_Togic;;echo '" onClick="javascript:gentogic();">
</form>
</div>

<div width="550" align = "justify">
<form name="kbr" action="javascript:genkbr()" method="post">
<input type="button" style="height:26px; line-height:26px" name="kbr" value="';echo $STR_LiveCus_Kbr;;echo '" onClick="javascript:genkbr();">
</form>
</div>
 
<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>
</body>
</html>';?>