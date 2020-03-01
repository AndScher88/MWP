<?php

SESSION_START();

if (!isset($_SESSION['login']) && $_SESSION['login'] == 0) {
    Header('Location: login.php');
} else {
    $_SESSION = array();
    SESSION_DESTROY();
}
?>
<!DOCTYPE HTML>
<html lang="de">
<head>
    <meta charset=utf-8">
    <meta http-equiv="refresh" content="2" ; URL="login.php">
    <link rel="icon" href="bilder/favicon.ico">
    <title>MWP-System - Logout</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<header>
    <div class="container container-nav">
        <div class="logolink">
                <h1 class="logo-h1">MWP-Systems</h1>
                <p class="subtitle">für eine bessere Organisation</p>
        </div>
    </div>
</header>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2 style="text-align: center">Sie wurden erfolgreich ausgeloggt!</h2>


</body>

</html>
