<?php

require_once 'template.class.php';

$baseDir = str_replace('\\', '/', dirname(__FILE__));
$temp = new template($baseDir.'/source/', $baseDir.'/compiled/');

$temp->assign('test', 'imooc女神');
$temp->assign('pagetitle', '山寨版smarty');

$temp->getSourceTemplate('index');
$temp->compileTemplate();
$temp->display();

/* 
 *功能扩展
 *	检测编译目录下是否存在已编译的模板？
 *		否->编译此模板
 *		是->编译后的模板最后修改时间是否比模板源文件更早？
 *			是->重新编译此模板
 *			否->加载此模板
 *
 *为模板引擎增加比如foreach循环语法，if判断语句的语法等等
 *
 */