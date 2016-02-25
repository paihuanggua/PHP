<?php
require_once('./file-imooc.php');
$arr=array(
	'id'=>1,
	'name'=>'zhaoguangzhi',
	'type'=>array(4,5,6),
	'test'=>array(22,23,24=>array(123,'lalala'),),
);
$file=new File();
//传$arr生成缓存 不传$arr获取缓存
/*if($file->cacheData('z_index_mk_cache',$arr)){
	echo "成功";
}else{
	echo "失败";
};*/

/*if($file->cacheData('z_index_mk_cache')){
	echo "成功";
	echo "<hr />";
	var_dump($file->cacheData('z_index_mk_cache'));
}else{
	echo "失败";
};*/

//删除缓存
if($file->cacheData('z_index_mk_cache',null)){
	echo "成功";
}else{
	echo "失败";
};
?>