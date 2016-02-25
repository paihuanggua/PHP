<?php

//

$image=imagecreatetruecolor(100, 30);//黑色
header('content-type:image/png');
imagepng($image);
//end
imagedestroy($image);
?>
