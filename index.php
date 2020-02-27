<?php include 'template.php' ?>

<body>
<div>
	<?php
	Session_Start();
	if (!isset($_SESSION['login']) || $_SESSION['login'] === 0) {
		Header('Location: login.php');
		exit();
	}

	require_once 'flashMeldung.php';

	?>
</div>
<div class="container">
    <h2>MWP-Systems</h2>
    <br>
    <p>
        Hier steht irgendwas zum Unternehmen....
    </p>
</div>
</body>
