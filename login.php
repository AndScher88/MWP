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
    <link rel="icon" href="bilder/favicon.ico">
    <title>MWP-System Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
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
<h1 class="container">Login</h1>
<form class="container" autocomplete="off" action="checklogin.php" method="post">
    <div class="container-form">
        <div class="form-form">
            <div class="form-label">
                <label id="benutzerlabel" for="benutzer">Benutzer: </label>
            </div>
            <div>
                <input class="form-input" id="benutzer" style="width:500px;" name="ausgewählter_benutzer" required>
            </div>
        </div>
        <div class="form-form">
            <div class="form-label">
                <label id="passwordfeldlabel" for="passwordfeld">Passwort: </label>
            </div>
            <div>
                <input class="form-input" id="passwordfeld" style="width:500px;" name="password" type="password"
                       required>
            </div>
        </div>
            <div>
                <button class="submit-btn" id="passwordbestätigenbutton" name="password_bestätigen" value="Anmelden"
                        type="submit">Login
                </button>
            </div>
    </div>
</form>
</body>
</html>
