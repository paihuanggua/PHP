<?php
//打开图片------------------------------------------------------------------------------------------
//1、配置图片路径（就是你想要操作的图片路径）
$src="gd.jpg";
//2、获取图片信息（通过GD库提供的方法，得到你想要处理的图片基本信息）
$info=getimagesize($src);
print_r($info);

//imagecreateformjpeg($src);复制图像

//3、通过图像的编号来获取图像的类型
//$type=image_type_to_extension($info[2]);
$type=image_type_to_extension($info[2],false);//加false去掉.
echo "<hr />";
print_r($type);
//4、在内存中创建一个和我们图像类型一样的图像
$fun="imagecreatefrom{$type}";//$fun=imagecreateformjpeg;$fun=imagecreateformpng
//5、把图片复制到我们的内存中
$image=$fun($src);//imagecreateformjpeg($src);imagecreateformpng($src);
//操作图片-------------------------------------------------------------------------------------------
//1、设置字体的路径localhost/image/1.php
$font="simhei.ttf";
//2、填写我们的水印内容
$content="你好，慕课！";
//3、设置字体的颜色RGB和透明度：参数1--内存中的图片；参数2--red；参数3--green；参数4--blue； RGB=255,255,255
$col=imagecolorallocatealpha($image, 255, 255, 255, 50);
//4、写入字体
imagettftext($image, 20, 0, 20, 30, $col, $font, $content);
//输出图片-------------------------------------------------------------------------------------------
//浏览器输出
header("content-type:".$info['mime']);
$func="image{$type}";//imagejpeg;imagepng
$func($image);
//保存图片
$func($image,'newimage.'.$type);//imagejpeg($image,'newimage.jpeg');
//销毁图片------------------------------------------------------------------------------------------
imagedestroy($image);
?>