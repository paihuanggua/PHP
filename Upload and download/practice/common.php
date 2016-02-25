<?php
/**
 * 得到文件扩展名
 * @param string $filename
 * @return string
 */
function getExt($fileName){
	return strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
}

/**
 * 产生唯一字符串
 * @return string
 */
function getUniName(){
	return md5(uniqid(microtime(true),true));
}

?>