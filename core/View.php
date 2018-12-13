<?php
namespace core;

class View
{
	// 模板文件
	protected $file;
	// 模板变量
	protected $vars = [];	// php >= 5.4

	// 读取文件的方法
	public function make($file)
	{
		// 模板放到 view 目录下，进行拼接
		$this->file = 'view/'.$file.'.html';
		return $this;
	}

	public function with($name, $value)
	{
		$this->vars[$name] = $value;
		return $this;
	}

	// 当我们输出一个对象的时候，系统会自动调用 __toString() 方法
	public function __toString()
	{
		extract($this->vars);
		include $this->file;

		return '';
	}
	
}