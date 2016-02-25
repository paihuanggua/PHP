<?php
$fileInfo=$_FILES['myFile'];
$name=$fileInfo['name'];
$type=$fileInfo['type'];
$tmp_nane=$fileInfo['tmp_name'];
$error=$fileInfo['error'];
$size=$fileInfo['size'];
//判断下错误号，只有为0或者为UPLOAD_ERR_OK,没有错误发生，上传成功
if($error==UPLOAD_ERR_OK){
	if(move_uploaded_file($tmp_nane, "upload/".$name)){
		echo "文件".$name."上传成功";
	}else{
		echo "文件".$name."上传失败";
	}
}else{
	//匹配错误信息
	switch ($error) {
		case 1:
			echo "上传文件超过PHP配置文件中upload_max_filesize选项";
			break;
		case 2:
			echo "超过表单max_file_size限制的大小";
			break;
		case 3:
			echo "文件部分被上传";
			break;
		case 4:
			echo "没有选择上传文件";
			break;
		case 6:
			echo "没有找到临时文件";
			break;
		case 7:
		case 8:
			echo "系统错误";
			break;
	}
}
?>