<?php
require_once __DIR__ . '/autoloader.php';
require_once 'template.php';

use classes\frontend\Table;
use classes\employee\Employee;

$employeeHead = new Employee();
$employeeHead->queryEmployees();
$resultEmployeeHead = $employeeHead->getResult();
$employeeBody = new Employee();
$employeeBody->queryEmployees();
$resultEmployeeBody = $employeeBody->getResult();
?>

<body >
<h3 class="text-center">Daten aller Mitarbeiter</h3>
<?php
$tableHead = new Table();
$tableHead->setResult($resultEmployeeHead);
$tableHead->createTableHead();
$tableBody = new Table();
$tableBody->setResult($resultEmployeeBody);
$tableBody->createTableBody();
?>
</table>


</body>
