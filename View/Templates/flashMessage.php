<?php

if (!isset($_SESSION['message'], $_SESSION['alert'])) {
	$_SESSION['message'] = '';
	$_SESSION['alert'] = '';
}

if ($_SESSION['message'] !== '') {
	$alert = '<div class="container "><div class="message-content" style="background-color: ' . $_SESSION['alert']
		. '">' . $_SESSION['message'] . '</div></div>';
	echo $alert;
	$_SESSION['message'] = '';
}
