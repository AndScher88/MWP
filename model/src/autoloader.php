<?php
spl_autoload_register(function($klassenName){
    $klassenPfad = str_replace('\\', '/', $klassenName);
    var_dump($klassenPfad);
    require __DIR__ . 'MWP-Systems/' . $klassenPfad . '.php';
});