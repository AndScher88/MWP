<?php
require_once __DIR__ . '/autoloader.php';
require_once 'template.php';
use classes\employee\Employee;
use classes\frontend\Table;

?>

<body >
<h3 class="text-center">Daten aller Mitarbeiter</h3>

<table class="table table-secondary text-left">
    <?php
    $employee = new Employee();
    $employee->queryEmployees();
    $resultEmployees = $employee->getResult();
    $table = new Table();
    $table->setResult($resultEmployees);
    $table->createTable();
    ?>
</table>
</body>
