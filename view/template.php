<?php
Session_Start();
if (!isset($_SESSION['login']) || $_SESSION['login'] === 0) {
	Header('Location: view/login.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="img/favicon.ico">
    <title>MWP-Systems</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
<header>
    <div class="container container-nav">
        <div class="logolink">
            <a href="index.php">
            <h1 class="logo-h1">MWP-Systems</h1>
            <p class="subtitle">für eine bessere Organisation</p>
            </a>
        </div>
	    <?php include 'navbar.php';?>
    </div>
</header>
<div class="container login-flash">
	<?php include 'flashMeldung.php'; ?>
</div>
</body>
