<?php
namespace web\controller;

use core\View;
use Gregwar\Captcha\CaptchaBuilder;

class Index
{
	// 保存实例化的 view 对象
	protected $view;

	// 构造函数中，实例化一个 View 模型
	public function __construct()
	{
		$this->view = new View();
	}

	public function show()
	{
		return $this->view->make('index')->with('version', '版本：1.0  copyright：hao');
	}

	// 渲染登录模板
	public function login()
	{
		//dd($_SESSION);
		return $this->view->make('login');
	}

	// 生成验证码
	public function code()
	{
		$builder = new CaptchaBuilder;
		$builder->build();
		header('Content-type: image/jpeg');

		// 将验证码存放到session当中，需要在框架运行一开始将session打开
		$_SESSION['phrase'] = $builder->getPhrase();

		$builder->output();
	}

}