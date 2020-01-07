<?php include "template.php" ?>
<title>Mitarbeiter erstellen</title>
<body class="text-center">
    <div class = "container-fluid">
        <h3 class="text-muted">Mitarbeiter erstellen</h3>
        <form class = "text-left" action="mitarbeiterneu.php" method="post">
            <div class="text-left">
                <label class="text-muted">Bitte hier die Daten des neuen Mitarbeiters eingeben: </label>
            </div>
            <div class = "form-row">
                <div class = "col">
                    <input type="text" name="vorname" class="form-control" id="vorname1" aria-describedby="vornamelabel" placeholder="Max" required>
                    <label id="vornamelabel" class="form-text text-muted">Vorname</label>
                </div>
                <div class="col">
                    <input type="text" name="nachname" class="form-control" id="nachname1" aria-describedby="nachnamelabel" placeholder="Mustermann" required>
                    <label id="nachnamelabel" class="form-text text-muted">Nachname</label>
                </div>
                <div class="col">
                    <input type="date" name="gebdatum" class="form-control" id="geburtsdatum1" aria-describedby="geburtsdatumlabel" required>
                    <label id="geburtsdatumlabel" class="form-text text-muted">Geburtsdatum</label>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="text" name="strasse" class="form-control" id="strasse1" aria-describedby="wohnortlabel" placeholder="Lindenstraße" required>
                    <label id="wohnortlabel" class="form-text text-muted">Wohnort</label>
                </div>
                <div class="col">
                    <input type="text" name="hausnummer" class="form-control" id="hausnummer1" aria-describedby="hausnummerlabel" placeholder="10a" required>
                    <label id="hausnummerlabel" class="form-text text-muted">Hausnummer</label>
                </div>
                <div class="col">
                    <input type="text" name="stadt" class="form-control" id="stadt" aria-describedby="stadtlabel" placeholder="Hamburg" required>
                    <label id="stadtlabel" class="form-text text-muted">Stadt</label>
                </div>
                <div class="col">
                    <input type="text" name="postleitzahl" class="form-control" id="postleitzahl1" aria-describedby="postleitzahllabel" placeholder="22880" required>
                    <label id="postleitzahllabel" class="form-text text-muted">Plz</label>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="tel" name="telefonnummer" class="form-control" id="telefonnummer1" aria-describedby="telefonnummerlabel" placeholder="015112345678" required>
                    <label id="telefonnummerlabel" class="form-text text-muted">Telefonnummer</label>
                </div>
                <div class="col">
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emaillabel" placeholder="max.mustermann@gmail.com" required>
                    <label id="emaillabel" class="form-text text-muted">E-Mail Adresse</label>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <select class="custom-select" id="abteilung" required>
                        <option value="" >Wählen...</option>
                        <option value="1">Human Resources</option>
                        <option value="2">Engineering</option>
                        <option value="3">Production</option>
                        <option value="4">IT</option>
                    </select>
                    <label id="abteilunglabel" class="form-text text-muted">Abteilung</label>
                </div>
            </div>
            <div class="btn-group" role="group" aria-label="hinzufügen">
                <button class="btn btn-secondary" value="Submit">Mitarbeiter hinzufügen</button>
            </div>
        </form>
    </div>
</body>
