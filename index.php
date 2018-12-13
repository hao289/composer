<?php
/*function __autoload($class){
	echo '需要自动加载'.$class;exit();
}

spl_autoload_register()*/

include 'vendor/autoload.php';

core\Bootstrap::run();