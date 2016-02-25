<?php
//$_FILES:文件上传变量
print_r($_FILES);

$filename=$_FILES['myFile']['name'];
$type=$_FILES['myFile']['type'];
$tmp_name=$_FILES['myFile']['tmp_name'];
$size=$_FILES['myFile']['size'];
$error=$_FILES['myFile']['error'];

//------------------------------------------------------
//第一种
//将服务器上的临时文件移动指定目录下
//=》move_upload_file($tmp_name,$destination);
//移动成功返回true，否则返回false
//move_uploaded_file($tmp_name, "upload/".$filename);

//--------------------------------------------------------
//第二种
//copy($src,$dst)将文件拷贝到指定目录，成功返回true，否则返回false
copy($tmp_name, "upload/".$filename);
?>