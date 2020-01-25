<?php

require_once __DIR__ . '/autoloader.php';
require_once "template.php";

use classes\employee\Employee;


$empl_id = $_GET['id'];
$employee = new Employee();
$employee->setEmplId($empl_id);
$employee->queryEmployee();
$resultEmployee = $employee->getResult();
$test = mysqli_fetch_assoc($resultEmployee);

?>

<?php require_once 'template.php';
?>
<title>Mitarbeiter bearbeiten</title>
<body class="text-center">
<div class = "container-fluid">
    <h3 class="text-muted">Mitarbeiter bearbeiten</h3>
    <form class = "text-left" action="mitarbeiterupdate.php" method="post">
        <div class="text-left">
            <label class="text-muted">Bitte hier die neuen Daten des Mitarbeiters eingeben: </label>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($empl_id) ?>">
        </div>
        <div class = "form-row">
            <div class = "col">
                <input type="text" name="vorname" class="form-control" id="vorname1" aria-describedby="vornamelabel" value="<?php echo htmlspecialchars($test['vorname']); ?>" required>
                <label id="vornamelabel" class="form-text text-muted">Vorname</label>
            </div>
            <div class="col">
                <input type="text" name="nachname" class="form-control" id="nachname1" aria-describedby="nachnamelabel" value="<?php echo htmlspecialchars($test['nachname']); ?>" required>
                <label id="nachnamelabel" class="form-text text-muted">Nachname</label>
            </div>
            <div class="col">
                <input type="date" name="gebdatum" class="form-control" id="geburtsdatum1" aria-describedby="geburtsdatumlabel" value="<?php echo htmlspecialchars($test['geburtsdatum']); ?>" required>
                <label id="geburtsdatumlabel" class="form-text text-muted">Geburtsdatum</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="text" name="strasse" class="form-control" id="strasse1" aria-describedby="wohnortlabel" value="<?php echo htmlspecialchars($test['strasse']); ?>" required>
                <label id="wohnortlabel" class="form-text text-muted">Wohnort</label>
            </div>
            <div class="col">
                <input type="text" name="hausnummer" class="form-control" id="hausnummer1" aria-describedby="hausnummerlabel" value="<?php echo htmlspecialchars($test['hausnummer']); ?>" required>
                <label id="hausnummerlabel" class="form-text text-muted">Hausnummer</label>
            </div>
            <div class="col">
                <input type="text" name="postleitzahl" class="form-control" id="postleitzahl1" aria-describedby="postleitzahllabel" value="<?php echo htmlspecialchars($test['postleitzahl']); ?>" required>
                <label id="postleitzahllabel" class="form-text text-muted">Plz</label>
            </div>
            <div class="col">
                <input type="text" name="stadt" class="form-control" id="stadt" aria-describedby="stadtlabel" value="<?php echo htmlspecialchars($test['stadt']); ?>" required>
                <label id="stadtlabel" class="form-text text-muted">Stadt</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="tel" name="telefonnummer" class="form-control" id="telefonnummer1" aria-describedby="telefonnummerlabel" value="<?php echo htmlspecialchars($test['telefonnummer']); ?>" required>
                <label id="telefonnummerlabel" class="form-text text-muted">Telefonnummer</label>
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emaillabel" value="<?php echo htmlspecialchars($test['email']); ?>">
                <label id="emaillabel" class="form-text text-muted">E-Mail Adresse</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <select class="custom-select" id="abteilung">
                    <option value="" >Wählen...</option>
                    <option value="1">Human Resources</option>
                    <option value="2">Engineering</option>
                    <option value="3">Production</option>
                    <option value="4">IT</option>
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


