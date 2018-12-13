<?php
namespace core;

class Bootstrap
{
	public static function run()
	{
		session_start();
		self::parseUrl();
	}

	// 分析URL生成控制器方法常量
	public static function parseUrl()
	{
		// dd($_SERVER);
		if (isset($_GET['s'])) {
			// 分析s变量生成控制器方法
			$info = explode('/', $_GET['s']);
			// dd($info);

			$class = "\web\controller\\".ucfirst($info[0]);
			$action = $info[1];

		}else{
			// 没有s,使用默认控制器方法
			$class = "\web\controller\Index";
			$action = "show";
		}

		// 注意下面这种写法对PHP版本是有要求的，
		echo (new $class)->$action();
	}

}