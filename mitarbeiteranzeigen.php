<?php

require_once __DIR__ . '/autoloader.php';
require_once 'template.php';

use classes\frontend\Table;

?>

<body>
<h3 class="text-center">Daten aller Mitarbeiter</h3>
<?php
$table = new Table();
$table->createTable();
?>
</body>
