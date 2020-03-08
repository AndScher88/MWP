<?php
error_reporting(0);
SESSION_START();
if (!isset($_SESSION['meldung'], $_SESSION['alert'])) {
	$_SESSION['meldung'] = '';
	$_SESSION['alert'] = '';
}
?>
<!DOCTYPE HTML>
<html lang="de">
<head>
    <meta charset=utf-8">
    <link rel="icon" href="img/favicon.ico">
    <title>MWP-System Login</title>
    <link rel="stylesheet"  href="../css/stylesheet.css">
</head>
<body>
<?php
$style = ($_SESSION['meldung'] === '') ? 'style="display:none;"' : 'style="display:inherit;"';
$alert = '<div class="container center-block text-center "><div ' . $style . ' class=" container text-center alert ' . $_SESSION['alert'] . '">' . $_SESSION['meldung'] . '</div></div>';

echo $alert;
$_SESSION['meldung'] = '';
?>
<header>
    <div class="container container-nav">
        <div class="logolink">
            <h1 class="logo-h1">MWP-Systems</h1>
            <p class="subtitle">für eine bessere Organisation</p>
        </div>
    </div>
</header>
<div class="container">
    <br>
<h1>Login</h1>
    <br>
    <form class="container-form" autocomplete="off" action="../controller/checklogin.php" method="post">
        <div class="form-form">
            <label id="benutzerlabel" for="benutzer">Benutzer: </label>
            <input id="benutzer" name="ausgewählter_benutzer" required>
            <label id="passwordfeldlabel" for="passwordfeld">Passwort: </label>
            <input id="passwordfeld" name="password" type="password" required>
            <button class="submit-btn" id="passwordbestätigenbutton" name="password_bestätigen" value="Anmelden"
                    type="submit">Login</button>
        </div>
    </form>
</div>
</body>
</html>
