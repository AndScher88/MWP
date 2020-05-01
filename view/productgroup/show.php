<?php
include 'view/templates/template.php';
?>

<body>

<?php
include 'view/templates/navbar.php';
?>

<br>
<h1 style="text-align: center">Warengruppen Übersicht</h1>
<br>
<form method="get" action="/productgroup/search/" class="search">
	<label for="suchen"></label>
	<input class="search-input" id="suchen" type="search" name="value" autofocus="autofocus"/>
	<input class="search-btn" type="submit" value="Suchen">
</form>
<br>