<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="bilder/favicon.ico">
    <title>Title</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/7a69025cc0.js"></script>
</head>
<body>

<?php
Session_Start();
if (!isset($_SESSION['login']) || $_SESSION['login'] === 0) {
    Header('Location: login.php');
    exit();
}

include 'navbar.php';
require_once 'flashMeldung.php';

?>

</body>