<?php

require_once __DIR__ . '/autoloader.php';
require_once 'template.php';


use classes\employee\Employee;
use classes\frontend\Table;

?>

<body>
<h2 style="text-align: center">Daten aller Mitarbeiter</h2>
<div>
	<?php
	$data = new Employee();
	$table = new Table($data->getAll());
	$table->render();
	?>
</div>
</body>
