<?php

namespace MWP\Src;

use MWP\Controller\ArticleController;
use MWP\Controller\ProductgroupController;
use MWP\Controller\SupplierController;

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

		if ($controllerMethod === 'search') {
			$url = explode('=', $url[3]);
			$methodParam = $url[1];
		}
		if ($controllerMethod === 'update' || $controllerMethod === 'save') {
			$methodParam = $_POST;
		}

//		if (!class_exists($controllerName) || !method_exists($controllerName, $controllerMethod)) {
//			$this->homepage();
//		}

		$controller = '';
		switch ($controllerName) {
			case 'ArticleController':
				$controller = new ArticleController();
				break;
			case 'ProductgroupController':
				$controller = new ProductgroupController();
				break;
			case 'SupplierController':
				$controller = new SupplierController();
				break;
//			case 'CustomerController':
//				$controller = new CustomerController();
//				break;
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
