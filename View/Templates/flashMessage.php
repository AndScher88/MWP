<?php

if (!isset($_SESSION['message'], $_SESSION['alert'], $_SESSION['test'])) {
	$_SESSION['message'] = '';
	$_SESSION['alert'] = '';
	$_SESSION['test'] = '';
}

if ($_SESSION['message'] !== '') {
	$alert = '<div class="container "><div class="message-content" style="background-color: ' . $_SESSION['alert']
		. '">' . $_SESSION['message'] . '</div></div>';
	echo $alert;
	echo $_SESSION['test'];
	$_SESSION['message'] = '';
}
