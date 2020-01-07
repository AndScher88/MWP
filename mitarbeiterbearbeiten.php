<?php

namespace classes\database;
require "classes\database\DatabaseConnector.php";

$meldung = [];
$conn = DatabaseConnector::getAccess('localhost', 'root', '', 'mwp-systems');

if (!isset($_GET['id']))
{
    $meldung = 'ID nicht gefunden!';
}
else
{
    $meldung = $_GET['id'];
}

echo $meldung;