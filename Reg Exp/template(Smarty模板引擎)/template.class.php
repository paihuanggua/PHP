<?php

class template {
	
	private $templateDir;
	private $compileDir;
	private $leftTag = '{#';
	private $rightTag = '#}';
	private $currentTemp = '';
	private $outputHtml;
	private $varPool = array();
	
	public function __construct($templateDir, $compileDir, $leftTag = null, $rightTag = null) {
		$this->templateDir = $templateDir;
		$this->compileDir = $compileDir;
		if(!empty($leftTag)) $this->leftTag = $leftTag;
		if(!empty($rightTag)) $this->rightTag = $rightTag;
	}
	
	public function assign($tag, $var) {
		$this->varPool[$tag] = $var;
	}
	
	public function getVar($tag) {
		return $this->varPool[$tag];
	}
	
	public function getSourceTemplate($templateName, $ext = '.html') {
		$this->currentTemp = $templateName;
		$sourceFilename = $this->templateDir.$this->currentTemp.$ext;
		$this->outputHtml = file_get_contents($sourceFilename);
	}
	
	public function compileTemplate($templateName = null, $ext = '.html') {
		$templateName = empty($templateName) ? $this->currentTemp : $templateName;
		
		$pattern = '/'.preg_quote($this->leftTag);
		$pattern .= ' *\$([a-zA-Z_]\w*) *';
		$pattern .= preg_quote($this->rightTag).'/';
		$this->outputHtml = preg_replace($pattern, '<?php echo $this->getVar(\'$1\');?>', $this->outputHtml);

		$compiledFilename = $this->compileDir.md5($templateName).$ext;
		file_put_contents($compiledFilename, $this->outputHtml);
	}
	
	public function display($templateName = null, $ext = '.html') {
		$templateName = empty($templateName) ? $this->currentTemp : $templateName;
		include_once $this->compileDir.md5($templateName).$ext;
	}
	
}