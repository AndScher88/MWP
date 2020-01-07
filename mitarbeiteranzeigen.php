<?php
namespace classes\database;
require "classes\database\DatabaseConnector.php";

$conn = DatabaseConnector::getAccess("localhost", "root", "", "mwp-systems");

$sql ="SELECT * FROM mitarbeiterdaten ORDER BY vorname ASC";

$result = $conn->query($sql);
$conn->close();

include "template.php";
?>

<body >
<h3 class="text-center">Daten aller Mitarbeiter</h3>
<table class="table table-secondary">
    <thead>
        <tr>
            <th class="text-left">Vorname </th>
            <th class="text-left">Nachname </th>
            <th class="text-left">Anschrift</th>
            <th class="text-left">Stadt</th>
            <th class="text-left">Postleitzahl</th>
            <th class="text-left">Geburtsdatum</th>
            <th class="text-left">Telefonnummer</th>
            <th class="text-left">E-Mail-Adresse</th>
            <th class="text-left"></th>
        </tr>
    </thead>

    <?php  foreach ($result as $mitarbeiter): ?>
    <tbody>
        <tr>
            <td class="text-left"><?php echo htmlspecialchars($mitarbeiter['vorname']); ?></td>
            <td class="text-left"><?php echo htmlspecialchars($mitarbeiter['nachname']); ?></td>
            <td class="text-left"><?php echo htmlspecialchars($mitarbeiter['strasse']) . " " . htmlspecialchars($mitarbeiter['hausnummer']); ?></td>
            <td class="text-left"><?php echo htmlspecialchars($mitarbeiter['stadt']); ?></td>
            <td class="text-left"><?php echo htmlspecialchars($mitarbeiter['postleitzahl']); ?></td>
            <td class="text-left"><?php echo htmlspecialchars($mitarbeiter['geburtsdatum']); ?></td>
            <td class="text-left"><?php echo htmlspecialchars($mitarbeiter['telefonnummer']); ?></td>
            <td class="text-left"><?php echo htmlspecialchars($mitarbeiter['email']); ?></td>
            <td class="text-left"><a href="mitarbeiterbearbeiten.php?id=<?php htmlspecialchars($mitarbeiter['id'])?>">Bearbeiten...</a></td>
            <td class="text-left"><a href="mitarbeiterloeschen.php?id=<?php htmlspecialchars($mitarbeiter['id'])?>">Löschen...</a></td>
        </tr>
    </tbody>

    <?php endforeach; ?>
</table>


</body>
