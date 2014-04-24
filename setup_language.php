<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(0);
$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
include "chooselang.php";
include '/tmp/lang.php';
;echo '
<html>
<head>
<title>';echo $STR_Setup;;echo '</title>
<link href="includes/tag.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false;" onLoad="document.forms.language.language.focus()">

<script language="javascript">

function goto(form){
//	var index=form.language.selectedIndex
//	if (document.language.selectedLang.value){
		document.language.target = \'gframe\';
		document.language.action = \'language.php\';
		document.language.submit();
		window.parent.location.reload();
//	}
}

function newwindow(w,h,webaddress,name){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
}
</script>


		<FORM NAME="language" method="post">
			<table border="0" >
              <tr><td><font face="Arial" color="white" size="2">';echo $STR_SelectLanguage;;echo '</td>
				  <td valign="top"><select name="language" class="listbox" ONCHANGE="goto(this.form)" size="1" style="FONT-SIZE: 12px; FONT-FAMILY: Arial, Helvetica, sans-serif; position: absolute;" onmousedown="if(this.options.length>12){this.size=12;}" onBlur="this.size=0;" >
							<option value="">';echo $STR_SelectLang;;echo '</option>
							<option value="chinese">';echo $STR_Chinese;;echo '</option>
							<option value="english">';echo $STR_English;;echo '</option>
							<!--<option value="arabic">';echo $STR_Arabic;;echo '</option>
							<option value="brazil">';echo $STR_Brazil;;echo '</option>							
							<option value="czech">';echo $STR_Czech;;echo '</option>
							<option value="danish">';echo $STR_Danish;;echo '</option>
							<option value="german">';echo $STR_German;;echo '</option>							
							<option value="spain">';echo $STR_Spain;;echo '</option>
							<option value="estonia">';echo $STR_Estonia;;echo '</option>
							<option value="greek">';echo $STR_Greek;;echo '</option>
							<option value="france">';echo $STR_France;;echo '</option>
							<option value="hungarian">';echo $STR_Hungarian;;echo '</option>
							<option value="hebrew">';echo $STR_Hebrew;;echo '</option>
							<option value="italy">';echo $STR_Italy;;echo '</option>
							<option value="kr">';echo $STR_Korean;;echo '</option>
							<option value="neder">';echo $STR_Neder;;echo '</option>
							<option value="polish">';echo $STR_Polish;;echo '</option>
							<option value="portu">';echo $STR_Portu;;echo '</option>
							<option value="russia">';echo $STR_Russia;;echo '</option>
							<option value="slovenia">';echo $STR_Solvenia;;echo '</option>
							<option value="thai">';echo $STR_Thai;;echo '</option>
							<option value="turkish">';echo $STR_Turkish;;echo '</option>
							<option value="vietname">';echo $STR_Vietname;;echo '</option>-->
					   </select></td>
              </tr>
           </table>
		</FORM>



<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>



</body>
</html>
';?>