<?php

namespace MWP\Model\Entity;

use MWP\Src\DatabaseClass;

/**
 * Class Supplier
 * @package MWP\Model\Entity
 */
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


	/**
	 * Supplier constructor.
	 * @param DatabaseClass $database
	 */
	public function __construct(DatabaseClass $database)
	{
		$this->database = $database;
	}

	/**
	 * @return array
	 */
	public function getAll()
	{
		return $this->database->select(self::GET_ALL, $parameter = null);
	}

	/**
	 * @param string $searchValue
	 * @return array
	 */
	public function getSearchValue(string $searchValue): array
	{
		$searchValue = '%' . $searchValue . '%';
		return $this->database->select(self::GET_SEARCHVALUE, $searchValue);
	}

	/**
	 * @param string $id
	 * @return mixed
	 */
	public function getOne(string $id): array
	{
		return $this->database->selectOne(self::GET_ONE, $id);
	}

	/**
	 * @param array $data
	 */
	public function update(array $data)
	{
		$this->database->update(self::UPDATE, $data);
	}

	/**
	 * @param int $id
	 */
	public function delete(int $id): void
	{
		$this->database->delete(self::DELETE, $id);
	}

	/**
	 * @return array|mixed
	 */
	public function getColumns(): array
	{
		return $this->database->getColumns(self::GET_COLUMNS);
	}

	public function new(array $masterData): void
	{
		$this->database->insert(self::NEW, $masterData);
	}
}
