<?php
    include 'View/Templates/template.php';
?>

<body>

<?php
    include 'View/Templates/navbar.php';
?>

<br>
<h1 style="text-align: center">Artikelstammdaten</h1>
<br>
<form method="get" action="/article/search/" class="search">
    <label for="suchen"></label>
    <input class="search-input" id="suchen" type="search" name="value" autofocus="autofocus"/>
    <input class="search-btn" type="submit" value="Suchen">
</form>
<br>