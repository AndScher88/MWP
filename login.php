<?php
SESSION_START();
?>
<!DOCTYPE HTML>
<html>
<title>MWP - Login</title>
<head>
    <meta charset=utf-8" >
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
</head>

<body>

<br>
<h2 class="text-center">Login</h2>
<br>
<br>
<?php
if($_SESSION["meldung"] == "")
{
    $style='style="display:none;"';
}
else
{
    $style='style="display:inherit;"';
}
$alert = '<div class="container center-block text-center ">
	<div '.$style.' class=" container text-center alert '.$_SESSION["alert"].'">'.$_SESSION["meldung"].'
	</div>
	</div>';
echo $alert;
$_SESSION["meldung"] = "";
?>
<div class="d-flex justify-content-center align-items-center container text-center">
    <form action="anmelden.php" method="post">
        <div class="form-group">
            <label id="benutzerlabel">Benutzer: </label>
            <input id="benutzer" style="width:200px;" name="ausgewählter_benutzer" class="form-control"></input>
        </div>
        <br>
        <label id="passwordfeldlabel" >Passwort: </label>
        <input id="passwordfeld" style="width:200px;" name="password" type="password" class="form-control center-block"></input></label>
        <br>
        <br>
        <br>
        <input id="passwordbestätigenbutton" name="password_bestätigen" value="Anmelden" type="submit" 	class="btn btn-success"></input>
    </form>
</div>

<script type="text/javascript">

</script>

</body>

</html>