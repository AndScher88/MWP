<nav>
    <ul>
        <!--<div>
            <a class="logo" href="index.php">
                <img src="bilder/home.png" width="40" height="40" class="d-inline-block align-top" alt="">
            </a>
        </div>-->
        <div class="dropdown">
            <button class="dropdown-btn">Mitarbeiterverwaltung</button>
            <div class="dropdown-content">
                <a href="mitarbeitererstellen.php">neuer Mitarbeiter</a>
                <a href="mitarbeiteranzeigen.php?link=mitarbeiteranzeigen">Mitarbeiter anzeigen</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropdown-btn">Artikelverwaltung</button>
            <div class="dropdown-content">
                <a href="artikelanzeigen.php">Artikel anzeigen</a>
                <a href="index.php">Artikel erstellen</a>
                <a href="index.php">Artikel suchen</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropdown-btn">Zeiterfassung</button>
            <div class="dropdown-content">
                <a href="index.php">Arbeitszeit hinzufügen</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropdown-btn">Tools</button>
            <div class="dropdown-content">
                <a href="index.php">URI</a>
            </div>
        </div>
        <!--###ADMIN###-->
        <div class="dropdown">
            <button class="dropdown-btn">User<?//php echo $_SESSION['realUsername']; ?></button>
            <div class="dropdown-content">
                <a href="accountpassword.php">Passwort ändern</a>
                <a href="logout.php">Abmelden</a>
            </div>
        </div>
    </ul>
</nav>

