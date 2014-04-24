<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
$data = $_POST['mylist'];
$doc =new DOMDocument();
$doc->load("files/mylist.xml");
for ($i=0;$i<count($data);$i++){
$mms_name=explode("->",$data[$i]);
$items = $doc->getElementsByTagName("video");
foreach($items as $item){
$name = $item->getElementsByTagName("videoname")->item(0)->nodeValue;
if (trim($name)==trim($mms_name[0])){
$item->parentNode->removeChild($item);
}
}
}
$doc->Save("files/mylist.xml");
;echo '<script language=javascript>
	parent.document.location.href = \'setup_mms.php\';
</script>';?>