<?php
namespace classes\database;
require "classes\database\DatabaseConnector.php";

$conn = DatabaseConnector::getAccess("localhost", "root", "", "mwp-systems");

if ($conn->connect_error)
{
    die("Connection failed: " . $conn -> connect_error);
}
//var_dump($_POST);
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
             echo "hat geklappt";
        }
    else
    {
        echo "Error :" . $sql . "<br>" . $conn->connect_error;
    }
    $conn->close();

    header('Location: mitarbeitererstellen.php');
    exit;
}

