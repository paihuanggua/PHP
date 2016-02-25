<?php 
$filename=$_GET['filename'];
echo $filename;
echo "<hr />";
echo basename($filename);
echo "<hr />";
header('content-disposition:attachment;filename='.basename($filename));
header('content-length:'.filesize($filename));
readfile($filename);