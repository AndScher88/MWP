<?php
namespace classes\database;

include "DatabaseConnector.php";

$var = DatabaseConnector::getAccess();
print_r($var);

?>
