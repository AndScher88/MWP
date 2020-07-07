<?php


namespace MWP\Model\Entity;


use MWP\Src\DatabaseClass;

class Supplier
{
	private DatabaseClass $database;

	private const GET_ALL = 'SELECT 
	lieferanten.id,
	lieferanten.name,
	lieferanten.strasse,
	lieferanten.hausnummer,
	lieferanten.postleitzahl,
	lieferanten.stadt,
	lieferanten.ansprechpartner_vorname,
	lieferanten.ansprechpartner_nachname
	FROM lieferanten';


	public function __construct()
	{
		$this->database = new DatabaseClass();
	}

	public function getAll()
	{
		return $this->database->select(self::GET_ALL, $parameter = null);
	}
}