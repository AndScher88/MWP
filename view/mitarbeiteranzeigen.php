<?php

require_once __DIR__ . '\autoloader.php';
require_once 'template.php';


use model\Employee;
use view\Table;

?>

<body>
<br>
<h1 style="text-align: center">Daten aller Mitarbeiter</h1>
<br>
<div>
	<?php
	$data = new Employee();
	$table = new Table($data->getAll());
	$table->render();
	?>
</div>
</body>
