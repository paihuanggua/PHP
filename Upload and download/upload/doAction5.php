 <?php 
//print_r($_FILES);
header("content-type:text/html;charset=utf-8");
require_once 'upload.func1.php';
require_once 'common.func.php';
$files=getFiles();
foreach($files as $fileInfo){
	$res=uploadFile($fileInfo);
	echo $res['mes'],'<br/>';
	$uploadFiles[]=$res['dest'];
}
$uploadFiles=array_values(array_filter($uploadFiles));
print_r($uploadFiles);