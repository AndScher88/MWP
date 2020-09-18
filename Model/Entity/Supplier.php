<?php


namespace MWP\Model\Entity;


use MWP\Src\DatabaseClass;

class Supplier
{
	private DatabaseClass $database;

	private const GET_ALL = 'SELECT 
	lieferanten.id,
	lieferanten.firma,
	lieferanten.strasse,
	lieferanten.hausnummer,
	lieferanten.postleitzahl,
	lieferanten.stadt,
	lieferanten.vorname,
	lieferanten.nachname
	FROM lieferanten';

	private const GET_SEARCHVALUE = 'SELECT * FROM
		lieferanten
		WHERE concat(
		    lieferanten.firma,
		    lieferanten. Vorname,
		    lieferanten. Nachname)
		    LIKE :searchValue
		';

	private const GET_ONE = 'SELECT
			lieferanten.id,
			lieferanten.firma,
			lieferanten.strasse,
			lieferanten.hausnummer,
			lieferanten.postleitzahl,
			lieferanten.stadt,
			lieferanten.vorname,
			lieferanten.nachname
			FROM lieferanten
			WHERE lieferanten.id = :id';

	private const UPDATE = 'UPDATE lieferanten SET
			lieferanten.firma = :firma,
			lieferanten.strasse = :strasse,
			lieferanten.hausnummer = :hausnummer,
			lieferanten.postleitzahl = :postleitzahl,
			lieferanten.stadt = :stadt,
			lieferanten.vorname = :vorname,
			lieferanten.nachname = :nachname
			WHERE lieferanten.id = :id';

	private const DELETE = 'DELETE FROM lieferanten WHERE id = :id';

	private const GET_COLUMNS = 'SHOW COLUMNS FROM lieferanten';

	private const NEW = 'INSERT INTO lieferanten (
                            firma, strasse, hausnummer, postleitzahl, stadt, 
                            vorname, nachname
                            )
                		VALUES  (:firma, :strasse, :hausnummer, :postleitzahl, :stadt, :vorname, :nachname)';


	public function __construct(DatabaseClass $database)
	{
		$this->database = $database;
	}

	public function getAll()
	{
		return $this->database->select(self::GET_ALL, $parameter = null);
	}

	public function getSearchValue(string $searchValue)
	{
		$searchValue = '%' . $searchValue . '%';
		return $this->database->select(self::GET_SEARCHVALUE, $searchValue);
	}

	public function getOne(string $id)
	{
		return $this->database->selectOne(self::GET_ONE, $id);
	}

	public function update(array $data)
	{
		$this->database->update(self::UPDATE, $data);
	}

	public function delete(int $id)
	{
		$this->database->delete(self::DELETE, $id);
	}

	public function getColumns()
	{
		return $this->database->getColumns(self::GET_COLUMNS);
	}

	public function new(array $masterData)
	{
		$this->database->insert(self::NEW, $masterData);
	}
}