<?php

spl_autoload_register(static function ($className) {
	$classPath = str_replace(array('\\', 'MWP/'), array('/', ''), $className);
	require_once '' . $_SERVER['DOCUMENT_ROOT'] . '/MWP-Systems/' . $classPath . '.php';
});
