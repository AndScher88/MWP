<?php

$style = ($_SESSION['meldung'] === '') ? 'style="display:none;"' : 'style="display:inherit;"';
$alert = '<div class="container"><div ' . $style . ' class=" container' . $_SESSION['alert'] . '">' . $_SESSION['meldung'] . '</div></div>';

echo $alert;
$_SESSION['meldung'] = '';
