<?php
error_reporting(0);
SESSION_START();
if (!isset($_SESSION['meldung'], $_SESSION['alert']))
{
    $_SESSION['meldung'] = '';
    $_SESSION['alert'] = '';
}
?>
<!DOCTYPE HTML>
<html lang="de">
<head>
    <meta charset=utf-8" >
    <link rel="icon" href="bilder/favicon.ico">
    <title>MWP-System Login</title>
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
</head>
<body>
<?php
if($_SESSION['meldung'] === '')
{
    $style='style="display:none;"';
}
else
{
    $style='style="display:inherit;"';
}
$alert = '<div class="container center-block text-center "><div '.$style.' class=" container text-center alert '.$_SESSION['alert'].'">'.$_SESSION['meldung'].'</div></div>';

echo $alert;
$_SESSION['meldung'] = '';
?>
<br>
<h2 class="text-center">Login</h2>
<br>
<div class="d-flex justify-content-center align-items-center container text-center">
    <form  autocomplete="off" action="checklogin.php" method="post">
        <div class="form-group">
            <label id="benutzerlabel" for="benutzer">Benutzer: </label>
            <input id="benutzer" style="width:200px;" name="ausgewählter_benutzer" class="form-control"/>
        </div>
        <br>
        <label id="passwordfeldlabel" for="passwordfeld">Passwort: </label>
        <input id="passwordfeld" style="width:200px;" name="password" type="password" class="form-control center-block">
        <br>
        <br>
        <br>
        <input id="passwordbestätigenbutton" name="password_bestätigen" value="Anmelden" type="submit" class="btn btn-success"/>
    </form>
</div>
</body>
</html>