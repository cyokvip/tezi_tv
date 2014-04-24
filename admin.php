<?php
require_once('config.php');
?>
<?php

session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include '/tmp/lang.php';
if($_SESSION['cur_tag']==""){
$_SESSION['cur_tag']='status';
}
if($_GET['tag']!=""){
$_SESSION['cur_tag']=$_GET['tag'];
}
if($_GET['tar']!=""){
$target=$_GET['tar'];
}else{
$target='#';
}
function cur($e){
if($_SESSION['cur_tag']==$e){
echo 'cur';
}
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
<script type="text/javascript" src="includes/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="includes/popup.js"></script>
</head>
<body oncontextmenu="return false;">
<div class="content">
	<div class="tag_top">
	</div>
	<div class="mid_folder">
		<div class="folder_split_L">
			<div class="tag"><div id="';cur("status");;echo 'tag_l"></div><div id="';cur("status");;echo 'tag_m"><a href="admin.php?tag=status&tar=hdplayerinfo.php">';echo $STR_SystemStatus;;echo '</a></div><div id="';cur("status");;echo 'tag_r"></div></div>
			<!-- <div class="tag"><div id="';cur("login");;echo 'tag_l"></div><div id="';cur("login");;echo 'tag_m"><a href="admin.php?tag=login&tar=register_form.php">';echo $STR_Login_Head;;echo '</a></div><div id="';cur("login");;echo 'tag_r"></div></div> -->
			<!-- <div class="tag"><div id="';cur("ddns");;echo 'tag_l"></div><div id="';cur("ddns");;echo 'tag_m"><a href="admin.php?tag=ddns&tar=setup_ddns.php">';echo $STR_DDNS_Head;;echo '</a></div><div id="';cur("ddns");;echo 'tag_r"></div></div> -->
			<div class="tag"><div id="';cur("http");;echo 'tag_l"></div><div id="';cur("http");;echo 'tag_m"><a href="admin.php?tag=http&tar=setup_http.php">';echo $STR_HTTP_Head;;echo '</a></div><div id="';cur("http");;echo 'tag_r"></div></div>
			<div class="tag"><div id="';cur("ftp");;echo 'tag_l"></div><div id="';cur("ftp");;echo 'tag_m"><a href="admin.php?tag=ftp&tar=setup_ftp.php">';echo $STR_FTP_Head;;echo '</a></div><div id="';cur("ftp");;echo 'tag_r"></div></div>
			<div class="tag"><div id="';cur("lang");;echo 'tag_l"></div><div id="';cur("lang");;echo 'tag_m"><a href="admin.php?tag=lang&tar=setup_language.php">';echo $STR_Language_Head;;echo '</a></div><div id="';cur("lang");;echo 'tag_r"></div></div>
			<!-- <div class="tag"><div id="';cur("nas");;echo 'tag_l"></div><div id="';cur("nas");;echo 'tag_m"><a href="admin.php?tag=nas&tar=setup_upnp_boost.php">';echo $STR_NAS_Mode;;echo '</a></div><div id="';cur("nas");;echo 'tag_r"></div></div> -->
			<!--<div class="tag"><div id="';cur("nfs");;echo 'tag_l"></div><div id="';cur("nfs");;echo 'tag_m"><a href="admin.php?tag=nfs&tar=setup_nfs.php">';echo $STR_NFS_Client;;echo '</a></div><div id="';cur("nfs");;echo 'tag_r"></div></div> -->
			<!-- <div class="tag"><div id="';cur("software");;echo 'tag_l"></div><div id="';cur("software");;echo 'tag_m"><a href="admin.php?tag=software&tar=setup_software.php">';echo $STR_SetupSoftware;;echo '</a></div><div id="';cur("software");;echo 'tag_r"></div></div> -->
			<div class="tag"><div id="';cur("transmission");;echo 'tag_l"></div><div id="';cur("transmission");;echo 'tag_m"><a href="admin.php?tag=transmission&tar=setup_transmission.php">';echo $STR_head_transmission;;echo '</a></div><div id="';cur("transmission");;echo 'tag_r"></div></div>
			<!--<div class="tag"><div id="';cur("net_favorites");;echo 'tag_l"></div><div id="';cur("net_favorites");;echo 'tag_m"><a href="admin.php?tag=net_favorites&tar=setup_net_favorites.php">';echo $STR_head_net_favorites;;echo '</a></div><div id="';cur("net_favorites");;echo 'tag_r"></div></div> -->
			<div class="tag"><div id="';cur("setup_mms");;echo 'tag_l"></div><div id="';cur("setup_mms");;echo 'tag_m"><a href="admin.php?tag=setup_mms&tar=setup_mms.php">';echo $STR_setup_mms;;echo '</a></div><div id="';cur("setup_mms");;echo 'tag_r"></div></div>
			<div class="tag"><div id="';cur("update");;echo 'tag_l"></div><div id="';cur("update");;echo 'tag_m"><a href="admin.php?tag=update&tar=setup_update.php">';echo $STR_OnlineUpdate;;echo '</a></div><div id="';cur("update");;echo 'tag_r"></div></div>
			<div class="tag"><div id="';cur("hackhd");;echo 'tag_l"></div><div id="';cur("hackhd");;echo 'tag_m"><a href="hackhd.php">';echo $STR_HACKHD;;echo '</a></div><div id="';cur("hackhd");;echo 'tag_r"></div></div>

			<div class="tag_down"></div>
		</div>
		<div class="folder_split_R"><iframe src="';echo $target;;echo '" style="width:100%; height:100%; border:none;" scrolling="no" frameborder="0"></iframe></div>
	</div>
	<div class="folder_footer">
	</div>
	<div class="footer">';include 'footer.php';;echo '</div>
</div>
</body>
</html>
';?>
