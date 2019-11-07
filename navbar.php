	<div class="container=100%">
		<nav class="navbar navbar-expand-md bg-secondary navbar-dark border border-dark justify-content-center navbar-fixed-top">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
                Navigation
            </button>
            <div id="navbarNav" class="navbar-collapse collapse ">
                <ul class="navbar-nav mr-auto mx-auto">
                <a class="navbar-brand" href="index.php">
                    <img src="bilder/home.png" width="32" height="32" class="d-inline-block align-top" alt="">
                </a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Stammdaten</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php" >Artikel</a>
                            <a class="dropdown-item" href="index.php" >Leistungen</a>
                            <a class="dropdown-item" href="index.php" >Kunden</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Zeiterfassung</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php" >Arbeitszeit hinzufügen</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Mitarbeiterverwaltung</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="mitarbeitererstellen.php" >neuer Mitarbeiter</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Tools</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php" >URI</a>
                        </div>
                    </li>
                </ul>
                    <ul class="navbar-nav">
                        <!--###ADMIN###-->
                        <li class="nav-item dropdown">
                            <a  class="nav-link dropdown-toggle " data-toggle="dropdown" href="#">
                                <?php echo $_SESSION['realUsername'];?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-right">
                                <a class="dropdown-item" href="accountpassword.php" >Passwort ändern</a>
                                <a class="dropdown-item" href="logout.php" >Abmelden</a>
                            </ul>
                        </li>
                    </ul>
            </div>
		</nav>
	</div>
