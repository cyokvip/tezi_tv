<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include '/tmp/lang.php';
if (substr($_GET['dir'],1,3)== 'HDD'){
$mediapath="/tmp/hdd/volumes".stripslashes($_GET['dir']);
$file= $mediapath.'/'.$_GET['file'];
}else{
$mediapath="/tmp/usbmounts".stripslashes($_GET['dir']);
$file= $mediapath.'/'.$_GET['file'];
}
;echo '<htmL>
<head>
<link href="includes/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="includes/jquery-1.4.3.min.js"></script>
<script language=javascript>
function change(){
	if(!document.filelist.new_name.value){
		alert(\'';echo $STR_SpecifyFile;;echo '\');
	}else if(document.filelist.new_name.value==document.filelist.old_name.value){
		alert(\'';echo $STR_FileAlreadyExists;;echo '\');
	}else{
		document.filelist.target = \'gframe\';
		document.filelist.action = "rename_file.php?dir=';echo $mediapath;;echo '";
		document.filelist.submit();	
	}
}

</script>
</head>
<body>
<div id="popup">
<form id=\'filelist\' name=\'filelist\' method=\'post\' action=\'javascript:change();\'>
<div id="oldName">
';echo $_GET['file'];;echo '<input value="';echo $_GET['file'];;echo '" id="old_name" type="hidden" name="old_name"/>
</div>
<div id="newName">
<input value="';echo $_GET['file'];;echo '" id="new_name" name="new_name"/>
</div>
<div id="apply">
<a onClick="change();">';echo $STR_RenameTitle;;echo '</a>
</div>
</form>
</div>
<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>
</body>
</htmL>';?>