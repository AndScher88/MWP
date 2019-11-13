<?php
namespace classes\database;
include "classes\database\DatabaseConnector.php";

$var = DatabaseConnector::getAccess();
//print_r($var);
?>
<body>
<?php
include "template.php";
$vorname;
$nachname;
$gebdatum;
$strasse;
$hausnummer;
$stadt;
$plz;
$telnummer;
$email;
$abteilung;

$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$gebdatum = $_POST["gebdatum"];
$strasse = $_POST["strasse"];
$hausnummer = $_POST["hausnummer"];
$telnummer = $_POST["telefonnummer"];

if ($vorname != "" && $nachname != "")
{
    echo "<p>Die aufgenommenen Daten wurden erfolgreich gespreichert!</p>";
}
else
{
  echo "Es ist ein Fehler aufgefreten!";
}
?>
</body>
