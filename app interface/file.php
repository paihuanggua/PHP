 <?php

class File {
	private $_dir;
 
	const EXT = '.txt';

	public function __construct() {
		$this->_dir = dirname(__FILE__) . '/files/';//dirname()返回路径中的目录部分。
	}
	public function cacheData($key, $value = '', $cacheTime = 0) {//j将$value和缓存时间一块写入到缓存中$cacheTime是秒为单位
		$filename = $this->_dir  . $key . self::EXT;

		if($value !== '') { // 将value值写入缓存--生成缓存
			if(is_null($value)) {//删除呢缓存
				return @unlink($filename);//删除呢文件--unlink
			}
			$dir = dirname($filename);//dirname()返回路径中的目录部分。
			if(!is_dir($dir)) {//判断给定文件名是否是一个目录
				mkdir($dir, 0777);
			}
			/**sprintf()
			*arg1、arg2、++ 参数将被插入到主字符串中的百分号（%）符号处。该函数是逐步执行的。在第一个 % 符号处，插入 arg1，在第二个 % 符号处，插入 arg2，依此类推。
			*注释：如果 % 符号多于 arg 参数，则您必须使用占位符。占位符位于 % 符号之后，由数字和 "\$" 组成。
			***/
			$cacheTime = sprintf('%011d', $cacheTime);//sprintf() 函数把格式化的字符串写入变量中。11位不够11位前面补0方便截取%d十进制的方式输出
			return file_put_contents($filename,$cacheTime . json_encode($value));
		}
		//获取缓存
		if(!is_file($filename)) {//判断文件是否存在 is_file
			return FALSE;
		} 
		$contents = file_get_contents($filename);
		$cacheTime = (int)substr($contents, 0 ,11);
		$value = substr($contents, 11);
		if($cacheTime !=0 && ($cacheTime + filemtime($filename) < time())) {
			unlink($filename);
			return FALSE;
		}
		return json_decode($value, true);
		
	}
}

$file = new File();

echo $file->cacheData('test1');