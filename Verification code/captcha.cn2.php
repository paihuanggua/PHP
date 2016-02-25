<?php

//中文验证码的实现
//依赖GD库的imagettftext()方法
//注意
//1、GBK编码时，需要将中文通过iconv()转为UTF-8
//2、选用的TTF文件需要支持中文

session_start();//-----------------------------------------

$image=imagecreatetruecolor(200, 60);//黑色
$bgcolor=imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bgcolor);//区域填充

$captch_code='';//----------------------------------------------

$str="从常州起步通过年的发展次高质量的海外并购拥有全球万名员工产业分布遍及中国以外的多个国家和地区成为了行业内世界第一的跨国集团金昇集团是一家真正具有“欧型血”的企业董事长潘雪平和执行总裁管烨都是中欧级校友从下图可以看出他们的跨国并购之旅是从中欧毕业之后开始的。在中欧的学习和教授的实战指导使他们成功地获得了集团海外发展和跨国并购战略的理论和实践基础而为回报母校金昇集团为中欧在欧洲建立教学基地提供了帮助最近的中欧校友大讲坛请来了管烨为我们独家披露了金昇的并购案例对于想要的";

//----------------
$fontface='MSYH.TTF';
$strdb=str_split($str,3);
//print_r($strdb);exit();
//echo count($strdb);
//----------------

for($i=0;$i<4;$i++){
	$fontcolor=imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
	$index=rand(0,count($strdb));
	
	$cn=$strdb[$index];

	
	$captch_code.=$cn;

	imagettftext($image, mt_rand(20,30), mt_rand(-20,20), (40*$i+20), mt_rand(30,30), $fontcolor, $fontface, $cn);
	
}

$_SESSION['authcode']=$captch_code;//---------------------------------

//添加点
for($i=0;$i<300;$i++){
	$pointcolor=imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
	imagesetpixel($image, rand(1,199), rand(1,199), $pointcolor);
}
//添加线
for($i=0;$i<4;$i++){
	$pointcolor=imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
	imageline($image, rand(1,199),rand(1,199),rand(1,199), rand(1,199), $pointcolor);
}
header('content-type:image/png');
imagepng($image);
//end
imagedestroy($image);

?>