<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
$mms_name = $_POST['mms_name'];
$mms_addr = $_POST['mms_addr'];
$doc=new DomDocument('1.0','utf-8');
$doc->formatOutput=true;
$doc->preserveWhiteSpace = false;
$doc->load("files/mylist.xml");
setItems();
$doc->saveXML();
$doc->save("files/mylist.xml");
echo "<script>parent.parent.window.location.reload();</script>";
function setItems(){
global $doc,$mms_name,$mms_addr;
$items[]=array('title'=>$mms_name,'link'=>$mms_addr);
$videolist=$doc->getElementsByTagName("videolist");
foreach($items as $v){
$item=$doc->createElement("video");
$videoname=$doc->createElement("videoname");
$videoname->appendChild($doc->createTextNode($v['title']));
$item->appendChild($videoname);
$link=$doc->createElement("link");
$link->appendChild($doc->createTextNode($v['link']));
$item->appendChild($link);
$videolist->item(0)->appendChild($item);
}
}
?>