<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
include '/tmp/lang.php';
;echo '<htmL>
<head>
<link href="includes/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="includes/jquery-1.4.3.min.js"></script>
<script language=javascript>
function add_mms(){
	if(!document.newmms.mms_name.value || !document.newmms.mms_addr.value ){
		alert("';echo $STR_input_mms_name_addr;;echo '");
		document.newmms.mms_name.focus();
	}else{
		document.newmms.target = \'gframe\';
		document.newmms.action = "mms_add.php";
		document.newmms.submit();	
	}
}

</script>
</head>
<body>
<center>
<form id=\'newmms\' name=\'newmms\' method=\'post\' action=\'javascript:add_mms();\'>
<table>
 <tr height=30px> </tr>
<tr align = "left"> ';echo $STR_MmsIntroduce;;echo ' </tr>
 <tr> 
<td> <font face="Arial" size="3" color="white">';echo $STR_MmsName;;echo '</font> </td> 
<td> <input type="text" name="mms_name" size="40" maxlength="50" value=""> </td>
</tr>

<tr>
<td> <font face="Arial" size="3" color="white">';echo $STR_MmsAddr;;echo '</font> </td>
<td> <input type="text" name="mms_addr" size="40" maxlength="150" value=""> </td>
</tr>
<tr height=30px> </tr>
</table>

<div>
<input type="button" name="add" value="';echo $STR_Add;;echo '" onClick="javascript:add_mms();">
</div>
</form>
</center>
<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>
</body>
</htmL>';?>