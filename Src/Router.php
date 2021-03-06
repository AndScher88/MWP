<?php

namespace MWP\Src;

Session_Start();

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


		$controllerName   = ucfirst($url[1]) . 'Controller';
		$controllerMethod = $url[2];

		$methodParam = $url[3] ?? '';

		if (!empty($_GET)) {
			$url         = explode('=', $url[3]);
			$methodParam = $url[1];
		}
		if (!empty($_POST)) {
			$methodParam = $_POST;
		}

		$factory = new Factory();

		$controller = '';
		switch ($controllerName) {
			case 'ArticleController':
				if (!isset($_SESSION['login']) || $_SESSION['login'] === '') {
					header('Location: /account/login');
				} else {
					$controller = $factory->createArticleController();
				}
				break;
			case 'ProductgroupController':
				if (!isset($_SESSION['login']) || $_SESSION['login'] === '') {
					header('Location: /account/login');
				} else {
					$controller = $factory->createProductgroupController();
				}
				break;
			case 'SupplierController':
				if (!isset($_SESSION['login']) || $_SESSION['login'] === '') {
					header('Location: /account/login');
				} else {
					$controller = $factory->createSupplierController();
				}
				break;
			case 'DataportalController':
				$controller = $factory->createDataportalController();
				break;
			case 'AccountController':
				$controller = $factory->createLoginController();
				break;
			default:
				$this->homepage();
				break;
		}
		if (!method_exists($controller, $controllerMethod)) {
			$this->homepage();
		}
		$controller->$controllerMethod($methodParam);
	}

	public function homepage(): void
	{
		if (!isset($_SESSION['login']) || $_SESSION['login'] === '') {
			header('Location: /account/login');
		} else {
			require_once 'View/home.php';
		}
		exit();
	}
}
