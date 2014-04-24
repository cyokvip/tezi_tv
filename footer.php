<?php

include "chooselang.php";
include '/tmp/lang.php';
$filename = "version.txt";
$fp = fopen($filename,'r');
$cur_ver = fread($fp,filesize($filename));
fclose($fp);
;echo '<a href="index.php" >';echo $STR_Home;;echo '</a> 
- <a href="admin.php?tag=status&tar=hdplayerinfo.php">';echo $STR_Setup;;echo '</a> 
- <a href="http://www.hdpfans.com" target="_blank">';echo $STR_VisitForum;;echo '</a> 
- <a href="admin.php?tag=update&tar=setup_update.php">';echo $cur_ver;;echo ' </a> 
<br /><br /><br />
<div><script type=\'text/javascript\' charset=\'gb2312\' src=\'http://js.adm.cnzz.net/s.php?sid=167725\'></script></div>
';?>