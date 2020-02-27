<?php

require_once __DIR__ . '/autoloader.php';
require_once 'template.php';


use classes\article\Article;
use classes\frontend\Table;

?>

<body>
    <div>
		<?php
		Session_Start();
		if (!isset($_SESSION['login']) || $_SESSION['login'] === 0) {
			Header('Location: login.php');
			exit();
		}

		//require_once 'flashMeldung.php';

		?>
    </div>
    <h2>Artikelstammdaten</h2>
	<?php
	$data = new Article();
	$table = new Table($data->getAll());
	$table->render();
	?>
</body>