<?php
require_once __DIR__ . '/autoloader.php';
require_once "template.php";
use classes\database\DatabaseConnector;


$conn = DatabaseConnector::getAccess();

$tabelle = new \classes\mitarbeiter\baueTabelle();

$sql ='SELECT * FROM mitarbeiterdaten ORDER BY vorname';

$result = $conn->query($sql);
$conn->close();


?>

<body >
<h3 class="text-center">Daten aller Mitarbeiter</h3>
<table class="table table-secondary">
    <thead>
        <tr class="text-left">
            <th>Vorname </th>
            <th>Nachname </th>
            <th>Anschrift</th>
            <th>Stadt</th>
            <th>Postleitzahl</th>
            <th>Geburtsdatum</th>
            <th>Telefonnummer</th>
            <th>E-Mail-Adresse</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php  foreach ($result as $mitarbeiter): ?>
            <tr class="text-left">
                <td><?php echo htmlspecialchars($mitarbeiter['vorname']); ?></td>
                <td><?php echo htmlspecialchars($mitarbeiter['nachname']); ?></td>
                <td><?php echo htmlspecialchars($mitarbeiter['strasse']) . " "
                             . htmlspecialchars($mitarbeiter['hausnummer']); ?></td>
                <td><?php echo htmlspecialchars($mitarbeiter['stadt']); ?></td>
                <td><?php echo htmlspecialchars($mitarbeiter['postleitzahl']); ?></td>
                <td><?php echo htmlspecialchars($mitarbeiter['geburtsdatum']); ?></td>
                <td><?php echo htmlspecialchars($mitarbeiter['telefonnummer']); ?></td>
                <td><?php echo htmlspecialchars($mitarbeiter['email']); ?></td>
                <td><a href="mitarbeiterbearbeiten.php?id=<?php htmlspecialchars($mitarbeiter['id'])?>">Bearbeiten...</a></td>
                <td><a href="mitarbeiterloeschen.php?id=<?php htmlspecialchars($mitarbeiter['id'])?>">Löschen...</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>


</body>
