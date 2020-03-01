<?php

require_once __DIR__ . '/autoloader.php';
require_once 'template.php';


use classes\article\Article;
use classes\frontend\Table;

?>

<body>
<br>
    <h1 style="text-align: center">Artikelstammdaten</h1>
<br>
	<?php
	$data = new Article();
	$table = new Table($data->getAll());
	$table->render();
	?>
</body>