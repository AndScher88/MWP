<?php
require_once __DIR__ . '/autoloader.php';

use classes\employee\Employee;

Session_Start();
if (!isset($_SESSION['login']) || $_SESSION['login'] === 0) {
    Header('Location: login.php');
    exit();
}

$empl_id = $_POST['id'];
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

if (isset($_POST['id'])) {
    if ($_POST['id'] > 0) {
        $empl_id = $_POST['id'];
        $employee = new Employee();
        $employee->setEmplId($empl_id);
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
        $employee->queryUpdateEmployee();

        header('Location: mitarbeiteranzeigen.php');
    }

}