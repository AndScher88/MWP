<?php

$style = ($_SESSION['meldung'] === '') ? 'style="display:none;"' : 'style="display:inherit;"';
$alert = '<div class="container center-block text-center "><div ' . $style . ' class=" container text-center alert ' . $_SESSION['alert'] . '">' . $_SESSION['meldung'] . '</div></div>';

echo $alert;
$_SESSION['meldung'] = '';
