<?php

namespace MWP\Controller;

if (!isset($_SESSION['meldung'], $_SESSION['alert'], $_SESSION['login'])) {
	$_SESSION['meldung'] = '';
	$_SESSION['alert']   = '';
	$_SESSION['login']   = '';
}

use MWP\Model\Account;

/**
 * Class AccountController
 * @package MWP\Controller
 */
class AccountController
{
	/** */
	private const CONFIG_LOGIN = [
		'title' => 'Login',
		'headline' => 'Bitte geben Sie hier Ihre Logindaten ein!',
		'action' => '/account/checkLogin',
		'actionName' => 'Login',
		'type' => '',
		'selectOption' => [],
	];

	/** @var Account */
	private Account $account;

	/**
	 * AccountController constructor.
	 * @param Account $account
	 */
	public function __construct(Account $account)
	{
		$this->account = $account;
	}

	/**
	 *
	 */
	public function register(): void
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/register.html';
	}

	/**
	 * @param array $userRegisterData
	 */
	public function createUser(array $userRegisterData)
	{
		var_dump($userRegisterData);
		die();
		//loginname und passwort müssen extrahiert werden. Das Passwort muss verchlüsselt werden.
		//Verfügbarkeit des loginnamen checken / Email als loginnamen verwenden????
		$logindata['loginname'] = $userRegisterData['loginname'];
		$logindata['password'] = $userRegisterData['password'];
		$this->account->register($logindata, $userRegisterData);

		//TODO: Die Datenerfassung muss hier noch verarbeitet werden damit ein Account angelegt werden kann!
	}

	/**
	 *
	 */
	public function login(): void
	{
		if ($_SESSION['login'] === 1) {
			header('Location: /');
		}
		if (!isset($_SESSION['login'])) {
			$_SESSION['login'] = '';
		}

		require_once 'View/Templates/template.php';
		require_once 'View/Templates/flashMessage.php';
		require_once 'View/Templates/login.html';
	}

	/**
	 * @param $methodparameter
	 */
	public function checkLogin($methodparameter): void
	{
		$resultUserData = $this->account->getUser($methodparameter['username']);

		// Beim Registreiren muss das passwort mit 'password_hash('string', PASSWORD_BCRYPT) erstellt werden.
		if ($resultUserData === []) {
			$_SESSION['message'] = 'Der Username existiert nicht!';
			$_SESSION['alert']   = 'red';
			header('Location:/account/login');
		} elseif (password_verify($methodparameter['password'], $resultUserData['pwdhash']) === true) {
			$_SESSION['login']   = 1;
			$_SESSION['message'] = 'Willkommen ' . $resultUserData['loginname'];
			$_SESSION['alert']   = 'limegreen';
			header('Location: /home');
		} else {
			$_SESSION['message'] = 'Das Passwort ist falsch!';
			$_SESSION['alert']   = 'red';
			header('Location: /account/login');
		}
	}

	/**
	 *
	 */
	public function logout(): void
	{
		if (!isset($_SESSION['login']) && $_SESSION['login'] === '') {
			Header('Location: /account/login');
		} else {
			$_SESSION = array();
			SESSION_DESTROY();
			header('Location: /View/Template/logout.php');
		}
	}
}
