<?php

session_start();//-----------------------------------------

$image=imagecreatetruecolor(100, 30);//黑色
$bgcolor=imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bgcolor);//区域填充

$captch_code='';//----------------------------------------------

for($i=0;$i<4;$i++){
	$fontsize=6;
	$fontcolor=imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
	$data='0123456789abcdefghijklmnopqrstuvwxyz';
	$fontcontent=substr($data, rand(0,strlen($data)),1);

	$captch_code.=$fontcontent;//-----------------------------------------

	$x=($i*100/4)+rand(5,10);
	$y=rand(5,10);
	imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}

$_SESSION['authcode']=$captch_code;//---------------------------------

//添加点
for($i=0;$i<300;$i++){
	$pointcolor=imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
	imagesetpixel($image, rand(1,99), rand(1,99), $pointcolor);
}
//添加线
for($i=0;$i<4;$i++){
	$pointcolor=imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
	imageline($image, rand(1,99),rand(1,99),rand(1,99), rand(1,99), $pointcolor);
}

header('content-type:image/png');
imagepng($image);
//end
imagedestroy($image);
?>