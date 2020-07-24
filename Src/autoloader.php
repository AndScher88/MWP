<?php

spl_autoload_register(static function ($klassenName) {

	$klassenPfad = str_replace(array('\\', 'MWP/'), array('/', ''), $klassenName);
require '' . $_SERVER['DOCUMENT_ROOT'] . '/' . $klassenPfad . '.php';
});
