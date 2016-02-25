<?php
$curl=curl_init('http://www.baidu.com');
$exec=curl_exec($curl);
curl_close($curl);
print_r($exec);
?>