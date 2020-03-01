<?php

require_once __DIR__ . '/autoloader.php';
require_once "template.php";

use classes\employee\Employee;


$id = $_GET['id'];
$employee = new Employee();
$resultEmployee = $employee->getOne($id);
$value = mysqli_fetch_assoc($resultEmployee);

?>

<?php require_once 'template.php';
?>
<title>Mitarbeiter bearbeiten</title>
<body class="text-center">
<div>
    <h3 style="text-align: center">Mitarbeiter bearbeiten</h3>
    <form action="mitarbeiterupdate.php" method="post">
        <div>
            <label class="text-muted">Bitte hier die neuen Daten des Mitarbeiters eingeben: </label>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id) ?>">
        </div>
        <div>
            <div>
                <input type="text" name="vorname" id="vorname1" aria-describedby="vornamelabel" value="<?php echo htmlspecialchars($value['vorname']); ?>" required>
                <label id="vornamelabel">Vorname</label>
            </div>
            <div>
                <input type="text" name="nachname" id="nachname1" aria-describedby="nachnamelabel" value="<?php echo htmlspecialchars($value['nachname']); ?>" required>
                <label id="nachnamelabel">Nachname</label>
            </div>
            <div>
                <input type="date" name="gebdatum" id="geburtsdatum1" aria-describedby="geburtsdatumlabel" value="<?php echo htmlspecialchars($value['geburtsdatum']); ?>" required>
                <label id="geburtsdatumlabel">Geburtsdatum</label>
            </div>
        </div>
        <div>
            <div>
                <input type="text" name="strasse" id="strasse1" aria-describedby="wohnortlabel" value="<?php echo htmlspecialchars($value['strasse']); ?>" required>
                <label id="wohnortlabel">Wohnort</label>
            </div>
            <div>
                <input type="text" name="hausnummer" id="hausnummer1" aria-describedby="hausnummerlabel" value="<?php echo htmlspecialchars($value['hausnummer']); ?>" required>
                <label id="hausnummerlabel">Hausnummer</label>
            </div>
            <div class="col">
                <input type="text" name="postleitzahl" class="form-control" id="postleitzahl1" aria-describedby="postleitzahllabel" value="<?php echo htmlspecialchars($value['postleitzahl']); ?>" required>
                <label id="postleitzahllabel" class="form-text text-muted">Plz</label>
            </div>
            <div class="col">
                <input type="text" name="stadt" class="form-control" id="stadt" aria-describedby="stadtlabel" value="<?php echo htmlspecialchars($value['stadt']); ?>" required>
                <label id="stadtlabel" class="form-text text-muted">Stadt</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="tel" name="telefonnummer" class="form-control" id="telefonnummer1" aria-describedby="telefonnummerlabel" value="<?php echo htmlspecialchars($value['telefonnummer']); ?>" required>
                <label id="telefonnummerlabel" class="form-text text-muted">Telefonnummer</label>
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emaillabel" value="<?php echo htmlspecialchars($value['email']); ?>">
                <label id="emaillabel" class="form-text text-muted">E-Mail Adresse</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <select class="custom-select" name="abteilung">
                    <option value="<?php echo htmlspecialchars($value['abteilung']) ?>"><?php echo htmlspecialchars($value['abteilung']) ?></option>
                    <option value="Human Resources">Human Resources</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Production">Production</option>
                    <option value="IT">IT</option>
                    <option value="Lager">Lager</option>
                    <option value="Sales">Sales</option>
                </select>
                <label id="abteilunglabel" class="form-text text-muted">Abteilung</label>
            </div>
        </div>
        <div class="btn-group" role="group" aria-label="update">
            <button class="btn btn-secondary" name="update" value="Submit">Mitarbeiter aktualisieren</button>
        </div>
    </form>
</div>
</body>


