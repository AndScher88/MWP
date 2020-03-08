<?php


namespace controller;


use model\LoginChecker;
use Exception;

require '../model/LoginChecker.php';


SESSION_START();

$user = $_POST['ausgewählter_benutzer'];
$pwd = $_POST['password'];


$logIn = new LoginChecker($user, $pwd);

try {
    $ret = $logIn->loginUser();
} catch (Exception $exception) {
    $_SESSION['meldung'] = $exception->getMessage();
    $_SESSION['alert'] = 'alert-danger';
    header('Location: ../../view/login.php');
    exit();
}
if ($ret !== '') {
    $_SESSION['login'] = 1;
    $_SESSION['realUsername'] = $ret;
    $_SESSION['meldung'] = 'Willkommen '.$ret;
    $_SESSION['alert'] = 'alert-success';
    header('Location: ../index.php');
    exit();
}
