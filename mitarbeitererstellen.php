<?php require_once 'template.php';
?>
<title>Mitarbeiter erstellen</title>
<body class="text-center">
<div class="container">
    <h2>Mitarbeiter erstellen</h2>
    <form action="mitarbeiterneu.php" method="post">
        <div class="container-form">
            <div>
                <label class="label-headline">Bitte hier die Daten des neuen Mitarbeiters eingeben: </label>
            </div>
            <div class="form-form">
                <div class="form-label">
                    <label id="vornamelabel">Vorname:</label>
                </div>
                <div>
                    <input class="form-input" type="text" name="vorname" id="vorname1" aria-describedby="vornamelabel"
                           placeholder="Max" required>
                </div>
                <div class="form-label">
                    <label id="nachnamelabel">Nachname:</label>
                </div>
                <div>
                    <input class="form-input" type="text" name="nachname" id="nachname1"
                           aria-describedby="nachnamelabel" placeholder="Mustermann" required>
                </div>
                <div class="form-label">
                    <label id="geburtsdatumlabel">Geburtsdatum:</label>
                </div>
                <div>
                    <input class="form-input" type="date" name="gebdatum" id="geburtsdatum1"
                           aria-describedby="geburtsdatumlabel" required>
                </div>
                <div class="form-label">
                    <label id="wohnortlabel">Wohnort:</label>
                </div>
                <div>
                    <input class="form-input" type="text" name="strasse" id="strasse1" aria-describedby="wohnortlabel"
                           placeholder="Lindenstraße" required>
                </div>
                <div class="form-label">
                    <label id="hausnummerlabel">Hausnummer:</label>
                </div>
                <div>
                    <input class="form-input" type="text" name="hausnummer" id="hausnummer1"
                           aria-describedby="hausnummerlabel" placeholder="10a" required>
                </div>
                <div class="form-label">
                    <label id="postleitzahllabel">Postleitzahl:</label>
                </div>
                <div>
                    <input class="form-input" type="text" name="postleitzahl" id="postleitzahl1"
                           aria-describedby="postleitzahllabel" placeholder="22880" required>
                </div>
                <div class="form-label">
                    <label id="stadtlabel">Stadt:</label>
                </div>
                <div>
                    <input class="form-input" type="text" name="stadt" id="stadt" aria-describedby="stadtlabel"
                           placeholder="Hamburg" required>
                </div>
                <div class="form-label">
                    <label id="telefonnummerlabel">Telefonnummer:</label>
                </div>
                <div>
                    <input class="form-input" type="tel" name="telefonnummer" id="telefonnummer1"
                           aria-describedby="telefonnummerlabel" placeholder="015112345678" required>
                </div>
                <div class="form-label">
                    <label id="emaillabel">E-Mail Adresse:</label>
                </div>
                <div>
                    <input class="form-input" type="email" name="email" id="email" aria-describedby="emaillabel"
                           placeholder="max.mustermann@gmail.com">
                </div>
                <div class="form-label">
                    <label id="abteilunglabel">Abteilung:</label>
                </div>
                <div>
                    <select class="form-select" name="abteilung">
                        <option value="">Wählen...</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Production">Production</option>
                        <option value="IT">IT</option>
                        <option value="Lager">Lager</option>
                        <option value="Sales">Sales</option>
                    </select>
                </div>
                <br>
                <div role="group" aria-label="hinzufügen">
                    <button class="submit-btn" value="Submit">Mitarbeiter hinzufügen</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</body>
