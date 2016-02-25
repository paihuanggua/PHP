<?php
header('content-type:text/html;charset=utf-8');
require_once 'upload.func .php';
$fileInfo=$_FILES['myFile'];
$allowExt=array('jpeg','jeg','png','gif','html','txt');
$newName=uploadFile($fileInfo,'imooc',false,$allowExt);
echo $newName;
?>