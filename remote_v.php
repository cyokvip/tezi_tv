<?php
require_once('config.php');
?>
<?php

include "chooselang.php";
include '/tmp/lang.php';
;echo '
<html>
<head>
<title>';echo $STR_RC;;echo '</title>

<script language="JavaScript">
function newwindow(w,h,webaddress,name){
	var viewimageWin = window.open(webaddress,name,"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width="+w+",height="+h);
	viewimageWin.moveTo(screen.availWidth/2-(w/2),screen.availHeight/2-(h/2));
	window.resizeTo(w, h+80);
}

function Playit(value){
	//alert(value);
	document.playlist.target = \'gframe\';
	document.playlist.action = \'play.php?dir=\'+ value;
	document.playlist.submit();
}
</script>
</head>

<body onload="javascript:moveTo(0,0);window.resizeTo(180,760)" bgcolor="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="165" height="586" border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td>
<table width="164" height="69" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#0000000">
	<tr>
		<td><a href="./remote_v.php" onfocus="this.blur()">
			<img src="images/change_01.png" width="72" height="69" alt="" border="0"></a></td>
		<td>
		
	<a href="./remote_h.php" onfocus="this.blur()">

			<img src="images/change_02.png" width="92" height="69" alt="" border="0"></a></td>
	</tr>
</table>
</td></tr>

<tr><td>
<form name="remocon" target=\'gframe\' action="rc_action.php" method="post">
<table width="165" height="586" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td colspan="30">
			<img src="images/remote_w_01.png" width="164" height="14" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="14" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="15">
			<img src="images/remote_w_02.png" width="11" height="274" alt=""></td>
		<td colspan="5">
		 <input type="submit" style="background: url(\'images/remote_w_03.png\');background-color:Transparent; height:41px; width:41px; border:none; cursor:hand" name="power"  value=" ">
		</td>
		<td colspan="7" rowspan="2">
			<img src="images/remote_w_04.png" width="14" height="53" alt=""></td>
		<td colspan="3">
		<input type="submit" style="background: url(\'images/remote_w_05.png\');background-color:Transparent; height:41px; width:33px; border:none; cursor:hand" name="home"  value=" ">
		</td>
		<td colspan="8" rowspan="4">
			<img src="images/remote_w_06.png" width="18" height="102" alt=""></td>
		<td colspan="3">
		<input type="submit" style="background: url(\'images/remote_w_07.png\');background-color:Transparent; height:41px; width:37px; border:none; cursor:hand" name="setup"  value=" ">
		</td>
		<td colspan="2" rowspan="12">
			<img src="images/remote_w_08.png" width="10" height="200" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="41" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="5">
			<img src="images/remote_w_09.png" width="41" height="65" alt=""></td>
		<td colspan="3">
			<img src="images/remote_w_10.png" width="33" height="12" alt=""></td>
		<td colspan="3" rowspan="4">
			<img src="images/remote_w_11.png" width="37" height="64" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="12" alt=""></td>
	</tr>
	<tr>
		<td colspan="6" rowspan="2">
			<img src="images/remote_w_12.png" width="13" height="49" alt=""></td>
		<td colspan="4">
		<input type="submit" style="background: url(\'images/remote_w_13.png\');background-color:Transparent; height:36px; width:34px; border:none; cursor:hand" name="up"  value=" ">
        </td>
		<td>
			<img src="images/spacer.png" width="1" height="36" alt=""></td>
	</tr>
	<tr>
		<td colspan="4">
			<img src="images/remote_w_14.png" width="34" height="13" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="13" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="8">
			<img src="images/remote_w_15.png" width="12" height="98" alt=""></td>
		<td colspan="6" rowspan="5">
		<input type="submit" style="background: url(\'images/remote_w_16.png\');background-color:Transparent; height:34px; width:38px; border:none; cursor:hand" name="enter"  value=" ">
		</td>
		<td colspan="7">
			<img src="images/remote_w_17.png" width="15" height="3" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="6" rowspan="7">
			<img src="images/remote_w_18.png" width="14" height="95" alt=""></td>
		<td colspan="2" rowspan="2">
		<input type="submit" style="background: url(\'images/remote_w_19.png\');background-color:Transparent; height:28px; width:35px; border:none; cursor:hand" name="right"  value=" ">
		</td>
		<td colspan="2" rowspan="7">
			<img src="images/remote_w_20.png" width="3" height="95" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="2">
		<input type="submit" style="background: url(\'images/remote_w_21.png\');background-color:Transparent; height:28px; width:41px; border:none; cursor:hand" name="left"  value=" ">
		</td>
		<td>
			<img src="images/spacer.png" width="1" height="27" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="5">
			<img src="images/remote_w_22.png" width="35" height="67" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="5">
			<img src="images/remote_w_23.png" width="41" height="68" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="6">
			<img src="images/remote_w_24.png" width="38" height="12" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="12" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="2">
			<img src="images/remote_w_25.png" width="4" height="52" alt=""></td>
		<td>
		<input type="submit" style="background: url(\'images/remote_w_26.png\');background-color:Transparent; height:36px; width:28px; border:none; cursor:hand" name="down"  value=" ">
		</td>
		<td colspan="2" rowspan="2">
			<img src="images/remote_w_27.png" width="6" height="52" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="36" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/remote_w_28.png" width="28" height="16" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="16" alt=""></td>
	</tr>
	<tr>
		<td colspan="4" rowspan="3">
			<img src="images/remote_w_29.png" width="10" height="74" alt=""></td>
		<td colspan="8" rowspan="2">
		<input type="submit" style="background: url(\'images/remote_w_30.png\');background-color:Transparent; height:47px; width:43px; border:none; cursor:hand" name="repeat"  value=" ">
		</td>
		<td colspan="3" rowspan="3">
			<img src="images/remote_w_31.png" width="9" height="74" alt=""></td>
		<td colspan="7" rowspan="2">
		<input type="submit" style="background: url(\'images/remote_w_32.png\');background-color:Transparent; height:47px; width:44px; border:none; cursor:hand" name="return"  value=" ">
		</td>
		<td rowspan="14">
			<img src="images/remote_w_33.png" width="6" height="371" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="5">
		<input type="submit" style="background: url(\'images/remote_w_34.png\');background-color:Transparent; height:45px; width:41px; border:none; cursor:hand" name="zoom"  value=" ">
		</td>
		<td>
			<img src="images/spacer.png" width="1" height="45" alt=""></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="images/remote_w_35.png" width="41" height="27" alt=""></td>
		<td colspan="8">
			<img src="images/remote_w_36.png" width="43" height="27" alt=""></td>
		<td colspan="7">
			<img src="images/remote_w_37.png" width="44" height="27" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="27" alt=""></td>
	</tr>
	<tr>
		<td rowspan="11">
			<img src="images/remote_w_38.png" width="3" height="297" alt=""></td>
		<td colspan="8">
		<input type="submit" style="background: url(\'images/remote_w_39.png\');background-color:Transparent; height:48px; width:53px; border:none; cursor:hand" name="subtitle"  value=" ">
		</td>
		<td colspan="2" rowspan="7">
			<img src="images/remote_w_40.png" width="6" height="206" alt=""></td>
		<td colspan="9">
		<input type="submit" style="background: url(\'images/remote_w_41.png\');background-color:Transparent; height:48px; width:47px; border:none; cursor:hand" name="tvmode"  value=" ">
		</td>
		<td colspan="3" rowspan="7">
			<img src="images/remote_w_42.png" width="6" height="206" alt=""></td>
		<td colspan="4">
		<input type="submit" style="background: url(\'images/remote_w_43.png\');background-color:Transparent; height:48px; width:38px; border:none; cursor:hand" name="16-9"  value=" ">
		</td>
		<td colspan="2" rowspan="7">
			<img src="images/remote_w_44.png" width="5" height="206" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="48" alt=""></td>
	</tr>
	<tr>
		<td colspan="8">
			<img src="images/remote_w_45.png" width="53" height="19" alt=""></td>
		<td colspan="9" rowspan="4">
			<img src="images/remote_w_46.png" width="47" height="86" alt=""></td>
		<td colspan="4">
			<img src="images/remote_w_47.png" width="38" height="19" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="19" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="3">
			<img src="images/remote_w_48.png" width="11" height="67" alt=""></td>
		<td>
		<input type="submit" style="background: url(\'images/remote_w_49.png\');background-color:Transparent; height:31px; width:32px; border:none; cursor:hand" name="vol_up"  value=" ">
		</td>
		<td colspan="4" rowspan="3">
			<img src="images/remote_w_50.png" width="10" height="67" alt=""></td>
		<td colspan="2" rowspan="2">
			<img src="images/remote_w_51.png" width="2" height="63" alt=""></td>
		<td>
		<input type="submit" style="background: url(\'images/remote_w_52.png\');background-color:Transparent; height:31px; width:34px; border:none; cursor:hand" name="vol_down"  value=" ">
		</td>
		<td rowspan="2">
			<img src="images/remote_w_53.png" width="2" height="63" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="31" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="images/remote_w_54.png" width="32" height="36" alt=""></td>
		<td>
			<img src="images/remote_w_55.png" width="34" height="32" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="32" alt=""></td>
	</tr>
	<tr>
		<td colspan="4" rowspan="2">
		<input type="submit" style="background: url(\'images/remote_w_56.png\');background-color:Transparent; height:52px; width:38px; border:none; cursor:hand" name="audio"  value=" ">
		</td>
		<td>
			<img src="images/spacer.png" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2">
			<img src="images/remote_w_57.png" width="9" height="72" alt=""></td>
		<td colspan="3">
		<input type="submit" style="background: url(\'images/remote_w_58.png\');background-color:Transparent; height:48px; width:38px; border:none; cursor:hand" name="mute"  value=" ">
		</td>
		<td colspan="3" rowspan="2">
			<img src="images/remote_w_59.png" width="6" height="72" alt=""></td>
		<td colspan="9">
		<input type="submit" style="background: url(\'images/remote_w_60.png\');background-color:Transparent; height:48px; width:47px; border:none; cursor:hand" name="info"  value=" ">
		</td>
		<td>
			<img src="images/spacer.png" width="1" height="48" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/remote_w_61.png" width="38" height="24" alt=""></td>
		<td colspan="9">
			<img src="images/remote_w_62.png" width="47" height="24" alt=""></td>
		<td colspan="4">
			<img src="images/remote_w_63.png" width="38" height="24" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="24" alt=""></td>
	</tr>
	<tr>
		<td rowspan="4">
			<img src="images/remote_w_64.png" width="8" height="91" alt=""></td>
		<td colspan="6">
		<input type="submit" style="background: url(\'images/remote_w_65.png\');background-color:Transparent; height:29px; width:44px; border:none; cursor:hand" name="preview"  value=" ">
		</td>
		<td colspan="2" rowspan="2">
			<img src="images/remote_w_66.png" width="6" height="42" alt=""></td>
		<td colspan="9">
		<input type="submit" style="background: url(\'images/remote_w_67.png\');background-color:Transparent; height:29px; width:44px; border:none; cursor:hand" name="play_pause"  value=" ">
		</td>
		<td colspan="2" rowspan="4">
			<img src="images/remote_w_68.png" width="5" height="91" alt=""></td>
		<td colspan="7">
		<input type="submit" style="background: url(\'images/remote_w_69.png\');background-color:Transparent; height:29px; width:44px; border:none; cursor:hand" name="next"  value=" ">
		</td>
		<td rowspan="4">
			<img src="images/remote_w_70.png" width="4" height="91" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="29" alt=""></td>
	</tr>
	<tr>
		<td colspan="6">
			<img src="images/remote_w_71.png" width="44" height="13" alt=""></td>
		<td colspan="9">
			<img src="images/remote_w_72.png" width="44" height="13" alt=""></td>
		<td colspan="7">
			<img src="images/remote_w_73.png" width="44" height="13" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="13" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="images/remote_w_74.png" width="1" height="49" alt=""></td>
		<td colspan="6">
		<input type="submit" style="background: url(\'images/remote_w_75.png\');background-color:Transparent; height:29px; width:44px; border:none; cursor:hand" name="pageup"  value=" ">
		</td>
		<td rowspan="2">
			<img src="images/remote_w_76.png" width="5" height="49" alt=""></td>
		<td colspan="9">
		<input type="submit" style="background: url(\'images/remote_w_77.png\');background-color:Transparent; height:29px; width:44px; border:none; cursor:hand" name="stop"  value=" ">
		</td>
		<td colspan="7">
		<input type="submit" style="background: url(\'images/remote_w_78.png\');background-color:Transparent; height:29px; width:44px; border:none; cursor:hand" name="pagedown"  value=" ">
		</td>
		<td>
			<img src="images/spacer.png" width="1" height="29" alt=""></td>
	</tr>
	<tr>
		<td colspan="6">
			<img src="images/remote_w_79.png" width="44" height="20" alt=""></td>
		<td colspan="9">
			<img src="images/remote_w_80.png" width="44" height="20" alt=""></td>
		<td colspan="7">
			<img src="images/remote_w_81.png" width="44" height="20" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="20" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.png" width="3" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="8" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="32" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="4" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="3" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="5" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="28" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="3" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="3" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="3" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="4" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="4" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="34" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="1" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="4" height="1" alt=""></td>
		<td>
			<img src="images/spacer.png" width="6" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
</form>
</td></tr>
</table>

<iframe name=\'gframe\' width=0 height=0 style="display:none"></iframe>
<div id="loadDiv" name="loadDiv" style="position:absolute; visibility:hidden; left:30;top:120;width:200; height:100; z-index:1;">
	<table cellspacing="0" cellpadding="0" border="0" width=100% height=100%>
		<td valign=middle align=center>
			<table borde=0 align=center>
				<td align=center>			
					<img src="dlf/upload.gif">
				</td>
			</table>
		</td>
	</table>
</div>
</body>
</html>';?>