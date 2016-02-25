<?php
$filename=$_GET['filename'];
header('content-disposition:attachment;filename='.baswname($filename));
header('content-length:'.filesize($filename));
readfile($filename);
?>