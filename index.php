<?php

require_once 'model/src/Router.php';

$url = $_SERVER['REQUEST_URI'];
$url = urldecode($url);
//$url = utf8_encode($url);
$router = new Router();
$router->process($url);
