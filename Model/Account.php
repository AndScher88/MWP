<?php

namespace MWP\Model;

use MWP\Src\DatabaseClass;

/**
 * Class Account
 * @package MWP\Model
 */
class Account
{
	private const GET_USERNAME = 'SELECT * FROM account WHERE loginname = :username';
	private const CREATE_DUDE =
		'INSERT INTO mitarbeiterdaten
		(gender, 
		 vorname, 
		 nachname, 
		 strasse, 
		 hausnummer, 
		 stadt, 
		 postleitzahl, 
		 geburtsdatum, 
		 telefonnummer, 
		 email) 
		 VALUES 
		 (:gender, 
		  :firstname,
		  :lastname,
		  :street,
		  :housenumber,
		  :city,
		  :citycode,
		  :birthday,
		  :telefonnumber,
		  :email
		  )';
	private const CREATE_USER = '
		INSERT INTO account (id, loginname, pwdhash, firstlogin, blocked, idmitarbeiterdaten) 
		VALUES (:loginname, :pwdhash, : firstlogin, :blocked, :idmitarbeiterdaten)';

	/** @var DatabaseClass */
	private DatabaseClass $database;

	/**
	 * Account constructor.
	 * @param DatabaseClass $database
	 */
	public function __construct(DatabaseClass $database)
	{
		$this->database = $database;
	}

	/**
	 * @param string $username
	 * @return array
	 */
	public function getUser($username): ?array
	{
		return $this->database->selectUser(self::GET_USERNAME, $username);
	}

	/**
	 * @param array $logindata
	 * @param array $userRegisterData
	 */
	public function register(array $logindata, array $userRegisterData): void
	{
		$this->database->insert(self::CREATE_USER, $logindata);
		$this->database->insert(self::CREATE_DUDE, $userRegisterData);
	}

	public function changePassword()
	{
	}

	public function deleteUser()
	{
	}
}
