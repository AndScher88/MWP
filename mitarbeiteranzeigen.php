<?php
require_once __DIR__ . '/autoloader.php';
require_once 'template.php';

use classes\frontend\Table;
use classes\employee\Employee;

$employee = new Employee();
$employee->queryEmployees();
$resultEmployee = $employee->getResult();

$table = new Table();
$table->setResult($resultEmployee);
?>

<body >
<h3 class="text-center">Daten aller Mitarbeiter</h3>
<?php $table->createTableHead();  ?>
<?php $table->createTableBody();  ?>
</table>


</body>
