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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2 class="text-center">Sie wurden erfolgreich ausgeloggt!</h2>


</body>

</html>
