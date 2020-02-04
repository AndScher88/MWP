<?php

require_once __DIR__ . '/autoloader.php';
require_once 'template.php';

use classes\employee\Employee;

?>

<body>
<h3 class="text-center">Daten aller Mitarbeiter</h3>
<?php
$employee = new Employee();
$employee->queryAllEmployees();
?>
</body>
