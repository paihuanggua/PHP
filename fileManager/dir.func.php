<?php 
//打开指定目录
/**
 * 遍历目录函数，只读取目录中的最外层的内容
 * @param string $path
 * @return array
 */
function readDirectory($path) {
	$handle = opendir ( $path );//打开指定目录
	while ( ($item = readdir ( $handle )) !== false ) {//注意!==解释->（文件名0==false的情况）
		//.和..这2个特殊目录->.表示当前目录 ->..代表上级目录
		if ($item != "." && $item != "..") {
			if (is_file ( $path . "/" . $item )) {//is_file判断是否为文件
				$arr ['file'] [] = $item;
			}
			if (is_dir ( $path . "/" . $item )) {//is_dir() 函数检查指定的文件是否是目录。
				$arr ['dir'] [] = $item;
			}
		
		}
	}
	closedir ( $handle );
	return $arr;
}
//$path="file";
//print_r(readDirectory($path));
//1-2到此结束

/**
 * 得到文件夹大小
 * @param string $path
 * @return int 
 */
function dirSize($path){
	$sum=0;
	global $sum;//定义成全局变量。因为在递归重新调用函数式$sum都为0了
	$handle=opendir($path);
	while(($item=readdir($handle))!==false){
		if($item!="."&&$item!=".."){
			if(is_file($path."/".$item)){
				$sum+=filesize($path."/".$item);
			}
			if(is_dir($path."/".$item)){
				//递归：函数自己调用自己
				$func=__FUNCTION__;//返回 函数名称
				$func($path."/".$item);
			}
		}
		
	}
	closedir($handle);
	return $sum;
}
//$path="file";
//echo dirSize($path);

function createFolder($dirname){
	//检测文件夹名称的合法性
	if(checkFilename(basename($dirname))){
		//当前目录下是否存在同名文件夹名称
		if(!file_exists($dirname)){
			if(mkdir($dirname,0777,true)){
				$mes="文件夹创建成功";
			}else{
				$mes="文件夹创建失败";
			}
		}else{
			$mes="存在相同文件夹名称";
		}
	}else{
		$mes="非法文件夹名称";
	}
	return $mes;
}
/**
 * 重命名文件夹
 * @param string $oldname
 * @param string $newname
 * @return string
 */
function renameFolder($oldname,$newname){
	//检测文件夹名称的合法性
	if(checkFilename(basename($newname))){
		//检测当前目录下是否存在同名文件夹名称
		if(!file_exists($newname)){
			if(rename($oldname,$newname)){
				$mes="重命名成功";
			}else{
				$mes="重命名失败";
			}
		}else{
			$mes="存在同名文件夹";
		}
	}else{
		$mes="非法文件夹名称";
	}
	return $mes;
}

function copyFolder($src,$dst){
	//echo $src,"---",$dst."----";
	if(!file_exists($dst)){
		mkdir($dst,0777,true);
	//	mkdir()函数作用：新建多级目录
	//   mkdir($path,0777,true)
	/*
		第一个参数：必须，代表要创建的多级目录的路径
		第二个参数：设定目录的权限，默认是0777，意味着最大可能的访问权
		第三个参数：true表示允许创建多级目录
	*/
	}
	$handle=opendir($src);
	while(($item=readdir($handle))!==false){
		if($item!="."&&$item!=".."){
			if(is_file($src."/".$item)){
				copy($src."/".$item,$dst."/".$item);
				//copy（）函数拷贝文件
			}
			if(is_dir($src."/".$item)){
				$func=__FUNCTION__;
				$func($src."/".$item,$dst."/".$item);
				//如果是文件夹，使用递归的方法把子文件夹下的文件进行复制
			}
		}
	}
	closedir($handle);
	return "复制成功";
	
}

/**
 * 剪切文件夹
 * @param string $src
 * @param string $dst
 * @return string
 */
function cutFolder($src,$dst){
	//echo $src,"--",$dst;
	if(file_exists($dst)){
		if(is_dir($dst)){//是否为文件夹
			if(!file_exists($dst."/".basename($src))){
				//使用rename()函数实现剪切文件夹操作
				if(rename($src,$dst."/".basename($src))){
					$mes="剪切成功";
				}else{
					$mes="剪切失败";
				}
			}else{
				$mes="存在同名文件夹";
			}
		}else{
			$mes="不是一个文件夹";
		}
	}else{
		$mes="目标文件夹不存在";
	}
	return $mes;
}

/**
 * 删除文件夹
 * @param string $path
 * @return string
 */
function delFolder($path){
	$handle=opendir($path);
	while(($item=readdir($handle))!==false){
		if($item!="."&&$item!=".."){
			if(is_file($path."/".$item)){
				unlink($path."/".$item);
			}
			if(is_dir($path."/".$item)){//递归：如果为目录继续调用本身
				$func=__FUNCTION__;
				$func($path."/".$item);
			}
		}
	}
	closedir($handle);
	rmdir($path);
	return "文件夹删除成功";
}











