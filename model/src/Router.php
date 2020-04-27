<?php

require_once 'model/foo.php';

class Router
{
	public function __construct()
	{
	}

	public function process($url): void
	{
		$url = explode('/', $url);


		if (!isset($url[1]) || !isset($url[2])) {
			$this->homepage();
		}

		$controllerName = ucfirst($url[1]) . 'Controller';
		$controllerMethod = $url[2];

		$methodParam = '';
		if (isset($url[3])) {
			$url = explode('=', $url[3]);
			$methodParam = $url[1];
		}

		require_once 'controller/' . $controllerName . '.php';

		if (!class_exists($controllerName) || !method_exists($controllerName, $controllerMethod)) {
			$this->homepage();
		}

		switch ($controllerName) {
			case 'ArticleController':
				$controller = new $controllerName;
				$controller->$controllerMethod($methodParam);
				break;
			default:
				require_once 'view/home.php';
				break;
		}
	}

	public function homepage(): void
	{
		require_once 'view/home.php';
		die();
	}

}