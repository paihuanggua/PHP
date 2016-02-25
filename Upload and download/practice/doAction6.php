<?php
//print_r($_FILES);
header('content-type:text/html;charset=utf-8');
require_once 'upload.func1.php';
require_once 'common.php';
$files=getFiles();
foreach ($files as $key => $fileInfo) {
	$res=uploadFile($fileInfo);
	echo $res['mes'].'<br />';
	$uploadFile[]=$res['dest'];
}
$uploadFile=array_values(array_filter(input))
print_r($uploadFile);
?>