<?php
require_once 'image.class.php';
$src='gd.jpg';

//------------压缩图片----------------------
//$image=new image($src);
//$image->thumb(300,200);
//$image->show();

//-------------字体图片----------------------
/*$content='Hellow world';
$font_url='simhei.ttf';
$size=50;
$color=array(
	0=>255,
	1=>0,
	2=>255,
	3=>20
);
$local=array(
	'x'=>120,
	'y'=>130
);
$angle=10;
$image=new Image($src);
$image->fontMark($content,$font_url,$size,$color,$local,$angle);
$image->show();
$image->save("fontMark");*/

//-------------水印图片----------------------
$content='Hellow world';
$font_url='simhei.ttf';
$size=50;
$color=array(
	0=>255,
	1=>0,
	2=>255,
	3=>20,
);
$local=array(
	'x'=>120,
	'y'=>330,
);
$angle=10;


$source='index.png';
$local2=array(
	'x'=>20,
	'y'=>50
);
$alpha=100;
$image=new Image($src);
$image->imageMark($source,$local2,$alpha);
$image->thumb(600,400);
$image->fontMark($content,$font_url,$size,$color,$local,$angle);
$image->show();
$image->save("allMark");
?>