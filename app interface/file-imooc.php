<?php
class File{
	private $_dir;

	const EXT='.txt';//这里是什么都行: .php  .html   ....

	public function __construct(){
		$this->_dir=dirname(__FILE__).'/files/';
		//echo $this->_dir;exit();
	}

	public function cacheData($key,$value='',$path){//$key->文件名；$value->缓存数据；$path->路径
		$filename=$this->_dir.$path.$key.self::EXT;
		echo "<hr />";
		//echo $filename;exit();
		if($value!==''){//将value值写入缓存
			if(is_null($value)){//删除缓存
				return @unlink($filename);
			}
			//判断目录是否存在
			$dir=dirname($filename);
			//echo $dir;exit();
			if(!is_dir($dir)){
				mkdir($dir,0777);
			}
			return file_put_contents($filename, json_encode($value));//file_put_contents()第二个参数为字符串
		}
		if(!is_file($filename)){//获取缓存
			return false;
		}else{
			//json_decode(file_get_contents($filename));返回对象形式
			return json_decode(file_get_contents($filename),true);//返回原值
		}
	}

}
?>