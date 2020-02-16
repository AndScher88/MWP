<?php

require_once __DIR__ . '/autoloader.php';
require_once 'template.php';


use classes\article\Article;
use classes\frontend\Table;

?>

<body>
<h3 class="text-center">Daten aller Mitarbeiter</h3>
<?php
$query = new Article();
$query->alleArtikel();
$queryResult = $query->getResult();

$table = new Table();
$table->setResult($queryResult);
$table->create();
?>
</body>

