<?php

require_once 'Src/autoloader.php';

use MWP\Src\Router;

$url = $_SERVER['REQUEST_URI'];
$url = urldecode($url);
//$url = utf8_encode($url);
$router = new Router();
$router->process($url);
die();
