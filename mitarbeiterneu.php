<?php
require __DIR__ . '/autoloader.php';
use classes\database\DatabaseConnector;
use classes\employee\Employee;

Session_Start();
if (!isset($_SESSION['login']) || $_SESSION['login'] === 0) {
    Header('Location: login.php');
    exit();
}

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
$abteilung = $_POST['abteilung'];

$employee = new Employee();
$employee->setVorname($vorname);
$employee->setNachname($nachname);
$employee->setGebdatum($gebdatum);
$employee->setStrasse($strasse);
$employee->setHausnummer($hausnummer);
$employee->setStadt($stadt);
$employee->setPostleitzahl($postleitzahl);
$employee->setTelefonnummer($telefonnummer);
$employee->setEmail($email);
$employee->setAbteilung($abteilung);



if (count($_POST) > 0) {
    $employee->createEmployees();

    header('Location: mitarbeitererstellen.php');
    exit;
}

