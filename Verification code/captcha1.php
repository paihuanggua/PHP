<?php
$image=imagecreatetruecolor(100, 30);//黑色
$bgcolor=imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bgcolor);//区域填充
header('content-type:image/png');
imagepng($image);
//end
imagedestroy($image);
?>