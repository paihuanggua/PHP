<?php
//获取缓存
// http://app.com/list.php?page-=1&pagesize=12
require_once('./response.php');
require_once('./file.php');

$file = new File();
$data = $file->cacheData('index_cron_cahce');
if($data) {
	return Response::show(200, '首页数据获取成功', $data);
}else{
	return Response::show(400, '首页数据获取失败', $data);
}
exit;
?>

