<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include '/tmp/lang.php';
$filename = "/usr/local/etc/setup.php";
$fp = fopen($filename,'r');
$fileData = fread($fp,filesize($filename));
fclose($fp);
$line = explode("\n",$fileData);
$i = 0;
while ($i <= 5) {
$dataPair = explode('=',$line[$i]);
if ($dataPair[0] == Login) {
$loginoption = $dataPair[1];
}elseif ($dataPair[0] == User) {
$data = explode(':',$dataPair[1]);
$user = $data[0];
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
	function disableAll()
	{
		if(document.register.login.checked)
		{
	//		document.register.username.disabled=false;
	//		document.register.password.disabled=false;
	//		document.register.passwordConfirm.disabled=false;
	//		document.register.submit.disabled=false;
		}else{
	//		document.register.username.disabled=true;
	//		document.register.password.disabled=true;
	//		document.register.passwordConfirm.disabled=true;
	//		document.register.submit.disabled=true;
		}
	}

function newwindow(w,h,webaddress, name){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>

';
;echo '
	<table cellspacing="0" cellpadding="0" border="0">
	<tr><td height=50 width=100></td><td></td></tr>
	
	<tr><td width=100></td>
		<td>
		<form name="register" action="register.php" method="post">
			<table border="0">
			  <tr><td width="140">';echo $STR_LoginOption;;echo '</td>
			  <td><input type="checkbox" id="chkbox" name="login" ';if ($loginoption =="true") {echo 'checked';};echo ' onclick=\'disableAll();\'>
			  <tr><td width="140">';echo $STR_Username;;echo '</td>
			  <td><input type="text" name="username" size="20" maxlength="16" value=';echo $user;;echo ' ><br></td></tr>
			  <tr><td width="140">';echo $STR_Password;;echo '</td>
			  <td><input type="password" name="password" size="20" maxlength="16" ><br></td></tr>
			  <tr><td width="140">';echo $STR_ConfirmPassword;;echo '</td>
			  <td><input type="password" name="passwordConfirm" size="20" maxlength="16"><br></td></tr>
			  <tr><td height="5"></td></tr>
			  <tr><td></td><td><input type="submit" name="submit" value="';echo $STR_Apply;;echo '"></td></tr>
			</table>
		</form>
		</td>
	</tr>
	</table>


</body>
</html>
';?>