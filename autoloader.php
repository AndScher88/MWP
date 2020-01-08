<?php
spl_autoload_register(function($klassenName){
    $klassenPfad = str_replace('\\', '/', $klassenName);
    require __DIR__ . '/' . $klassenPfad . '.php';
});