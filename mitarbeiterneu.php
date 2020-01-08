<?php
require __DIR . '/autoloader.php';
use classes\database\DatabaseConnector;
Session_Start();
if (!isset($_SESSION['login']) || $_SESSION['login'] === 0) {
    Header('Location: login.php');
    exit();
}
require "classes\database\DatabaseConnector.php";

$conn = DatabaseConnector::getAccess();

$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$gebdatum = $_POST['gebdatum'];
$strasse = $_POST['strasse'];
$hausnummer = $_POST['hausnummer'];
$stadt = $_POST['stadt'];
$postleitzahl = $_POST['postleitzahl'];
$telefonnummer = $_POST['telefonnummer'];
$email = $_POST['email'];

if (count($_POST) > 0) {
    $sql ="INSERT INTO mitarbeiterdaten (vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email) 
            VALUES ('$vorname', '$nachname', '$strasse', '$hausnummer', '$stadt', '$postleitzahl', '$gebdatum', '$telefonnummer', '$email')";

    if ($conn->query($sql) === TRUE)
        {
            $_SESSION['meldung'] = 'Mitarbeiter wurde erfolgreich hinzugefügt!';
            $_SESSION['alert'] = 'alert-success';
        }
    else
    {
        $_SESSION['meldung'] = 'Einfügen hat nicht geklappt';
        $_SESSION['alert'] = 'alert-danger';
    }
    $conn->close();

    header('Location: mitarbeitererstellen.php');
    exit;
}

