<?php
header('content-type:text/html;charset=utf-8');
require_once 'upload.func.php';
foreach ($_FILES as $key => $fileInfo) {
	$files[]=uploadFile($fileInfo);
}
print_r($files);
?>