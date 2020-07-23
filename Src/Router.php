<?php

namespace MWP\Src;

use MWP\Controller\ArticleController;
use MWP\Controller\ProductgroupController;
use MWP\Controller\SupplierController;

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
				$data = null;
				if ($_POST) {
					$data = $_POST;
				}
				if (isset($_GET['id'])) {
					$data = $_GET['id'];
				}
				$controller = new ArticleController($data);
				break;
			case 'ProductgroupController':
				$controller = new ProductgroupController();
				break;
			case 'SupplierController':
				$controller = new SupplierController();
				break;
			case 'CustomerController':
				$controller = new CustomerController();
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
