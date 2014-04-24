<?php
require_once('config.php');
?>
<?php

header('Content-Type: text/html; charset=utf-8');
include '/tmp/lang.php';
copy("/opt/bin/runonce/runonce-1.sh","/usr/local/etc/dvdplayer/runonce-1.sh");
copy("/opt/bin/runonce/runonce-2.sh","/usr/local/etc/dvdplayer/runonce-2.sh");
echo "<script>alert('$STR_start_convert');</script>";
?>