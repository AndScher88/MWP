<?php
require_once __DIR__ . '/autoloader.php';

use classes\employee\Employee;

Session_Start();
if (!isset($_SESSION['login']) || $_SESSION['login'] === 0) {
    Header('Location: login.php');
    exit();
}


$emplId = $_GET['id'];

$employee = new Employee();
$employee->setEmplId($emplId);
$employee->queryDeleteEmployee();

header('Location: mitarbeiteranzeigen.php');
