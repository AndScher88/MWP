<?php
namespace classes\database;
include "classes\database\DatabaseConnector.php";

$var = DatabaseConnector::getAccess();
print_r($var);
?>
