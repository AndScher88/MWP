<?php require_once 'template.php';
?>
<title>Mitarbeiter erstellen</title>
<body class="text-center">
<div class="container">
    <h2>Mitarbeiter erstellen</h2>
    <form class="container-form" action="mitarbeiterneu.php" method="post">

        <div>
            <label class="label-headline">Bitte hier die Daten des neuen Mitarbeiters eingeben: </label>
        </div>
        <div class="form-form">
            <label id="vornamelabel" for="vorname">Vorname:</label>
            <input type="text" name="vorname" id="vorname" aria-describedby="vornamelabel"
                   placeholder="Max" required>
            <label id="nachnamelabel" for="nachname">Nachname:</label>
            <input type="text" name="nachname" id="nachname"
                   aria-describedby="nachnamelabel" placeholder="Mustermann" required>
            <label id="geburtsdatumlabel" for="geburtsdatum">Geburtsdatum:</label>
            <input type="date" name="gebdatum" id="geburtsdatum"
                   aria-describedby="geburtsdatumlabel" required>
            <label id="wohnortlabel" for="strasse">Wohnort:</label>
            <input class="form-input" type="text" name="strasse" id="strasse" aria-describedby="wohnortlabel"
                   placeholder="Lindenstraße" required>
            <label id="hausnummerlabel" for="hausnummer">Hausnummer:</label>
            <input class="form-input" type="text" name="hausnummer" id="hausnummer"
                   aria-describedby="hausnummerlabel" placeholder="10a" required>
            <label id="postleitzahllabel" for="postleitzahl">Postleitzahl:</label>
            <input type="text" name="postleitzahl" id="postleitzahl"
                   aria-describedby="postleitzahllabel" placeholder="22880" required>
            <label id="stadtlabel" for="stadt">Stadt:</label>
            <input type="text" name="stadt" id="stadt" aria-describedby="stadtlabel"
                   placeholder="Hamburg" required>
            <label id="telefonnummerlabel" for="telefonnummer">Telefonnummer:</label>
            <input type="tel" name="telefonnummer" id="telefonnummer"
                   aria-describedby="telefonnummerlabel" placeholder="015112345678" required>
            <label id="emaillabel" for="email">E-Mail Adresse:</label>
            <input type="email" name="email" id="email" aria-describedby="emaillabel"
                   placeholder="max.mustermann@gmail.com">
            <label id="abteilunglabel" for="abteilung">Abteilung:</label>

            <select name="abteilung" id="abteilung">
                <option value="">Wählen...</option>
                <option value="Human Resources">Human Resources</option>
                <option value="Engineering">Engineering</option>
                <option value="Production">Production</option>
                <option value="IT">IT</option>
                <option value="Lager">Lager</option>
                <option value="Sales">Sales</option>
            </select>
            <br>
            <div role="group" aria-label="hinzufügen">
                <button class="submit-btn" value="Submit">Mitarbeiter hinzufügen</button>
            </div>
        </div>
    </form>
</div>
</div>
</body>
