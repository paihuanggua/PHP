<?php
/*
*定义一个接口
*提供一个标准
*/
interface video{
	public function getVideos();
	public function getCount();
}
class movie implements video{
	public function getVideos(){
		echo 1;
	}
	public function getCount(){
		echo 2;
	}
}
movie::getVideos();
?>