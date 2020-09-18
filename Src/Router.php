<?php

namespace MWP\Src;

use MWP\Controller\Factory;

/**
 * Class Router
 * @package MWP\Src
 */
class Router
{
	/** @param $url */
	public function process($url): void
	{
		$url = explode('/', $url);

		if (!isset($url[1]) || !isset($url[2])) {
			$this->homepage();
		}


		$controllerName = ucfirst($url[1]) . 'Controller';
		$controllerMethod = $url[2];

		$methodParam = $url[3] ?? '';

		if ($controllerMethod === 'espData') {
			$url = explode('?', $url[3]);
			$methodParam = $_GET;
		}
		if ($controllerMethod === 'search') {
			$url = explode('=', $url[3]);
			$methodParam = $url[1];
		}
		if ($controllerMethod === 'update' || $controllerMethod === 'save') {
			$methodParam = $_POST;
		}


		$factory = new Factory();

		$controller = '';
		switch ($controllerName) {
			case 'ArticleController':
				$controller = $factory->createArticleController();
				break;
			case 'ProductgroupController':
				$controller = $factory->createProductgroupController();
				break;
			case 'SupplierController':
				$controller = $factory->createSupplierController();
				break;
			case 'DataportalController':
				$controller = $factory->createDataportalController();
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
		exit();
	}
}
