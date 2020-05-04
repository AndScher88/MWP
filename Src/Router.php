<?php

namespace MWP\Src;

use MWP\Controller\ArticleController;
use MWP\Controller\ProductgroupController;

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

//		if (!class_exists($controllerName) || !method_exists($controllerName, $controllerMethod)) {
//			$this->homepage();
//		}

		switch ($controllerName) {
			case 'ArticleController':
				$controller = new ArticleController();
				break;
			case 'ProductgroupController':
				$controller = new ProductgroupController();
				break;
			default:
				$this->homepage();
				break;
		}

		$controller->$controllerMethod($methodParam);
	}

	public function homepage(): void
	{
		require_once 'View/home.php';
		die();
	}

}