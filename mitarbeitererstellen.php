<?php include "template.php" ?>
<title>Mitarbeiter erstellen</title>
<body class="text-center">
  <div class = "container-fluid">
    <h3>Mitarbeiter erstellen</h3>
    <br>
    <h6 class="text-left">Bitte hier die Daten des neuen Mitarbeiters eingeben: </h6>
    <form class = "text-left">
      <div class = "row">
        <div class = "col">
          <input type="text" class="form-control" id="vorname" placeholder="Max">
          <small id="emailhelp" class="form-text text-muted">Vorname</small>
        </div>
      <div class="col">
        <input type="text" class="form-control" id="nachname" placeholder="Mustermann">
        <small id="emailhelp" class="form-text text-muted">Nachname</small>
      </div>
      <div class="col">
        <input type="text" class="form-control" id="geburtsdatum" placeholder="dd.MM.YYYY">
        <small id="emailhelp" class="form-text text-muted">Geburtsdatum</small>
      </div>
    </div><br>
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" id="strasse" placeholder="Lindenstraße">
        <small id="emailhelp" class="form-text text-muted">Wohnort</small>
      </div>
      <div class="col">
        <input type="text" class="form-control" id="hausnummer" placeholder="10a">
        <small id="emailhelp" class="form-text text-muted">Hausnummer</small>
      </div>
      <div class="col">
        <input type="text" class="form-control" id="stadt" placeholder="Hamburg">
        <small id="emailhelp" class="form-text text-muted">Stadt</small>
      </div>
      <div class="col">
        <input type="text" class="form-control" id="postleitzahl" placeholder="22880">
        <small id="emailhelp" class="form-text text-muted">Plz</small>
      </div>
    </div><br>
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" id="telefonnummer" placeholder="015112345678">
        <small id="emailhelp" class="form-text text-muted">Telefonnummer</small>
      </div>
      <div class="col">
        <input type="text" class="form-control" id="email" placeholder="max.mustermann@gmail.com">
        <small id="emailhelp" class="form-text text-muted">E-Mail Adresse</small>
      </div>
    </div>
    </form>
  </div>
</body>
