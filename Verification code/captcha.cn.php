<?php

session_start();//-----------------------------------------

$image=imagecreatetruecolor(200, 60);//黑色
$bgcolor=imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bgcolor);//区域填充

$captch_code='';//----------------------------------------------

//----------------
$fontface='MSYH.TTF';
$strdb=array('中','华','人','民','共','和','国');
//----------------

for($i=0;$i<4;$i++){
	$fontcolor=imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
	$cn=$strdb[$i];
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