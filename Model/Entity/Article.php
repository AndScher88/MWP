<?php

namespace MWP\Model\Entity;

use MWP\Src\DatabaseClass;

class Article
{
	/** @var DatabaseClass */
	private DatabaseClass $database;

	private const GET_ALL = 'SELECT
       	artikelstammdaten.id,
       	artikelstammdaten.artikelnummer, 
       	artikelstammdaten.typ,
       	artikelstammdaten.bezeichnung, 
       	artikelstammdaten.spezifikation,
       	artikelstammdaten.hersteller,
       	artikelstammdaten.bestand
		FROM artikelstammdaten';

	private const GET_SEARCHVALUE = 'select * from 
				artikelstammdaten 
				where concat(artikelnummer,
				typ, 
				bezeichnung, 
				spezifikation, 
				hersteller, 
				warengruppe) 
                like ?
		';

	private const NEW = 'INSERT INTO artikelstammdaten (
                            artikelnummer, typ,  bezeichnung, spezifikation, erwSpezifikation, 
                            hersteller, bestand, warengruppe
                            )
                	VALUES  (?, ?, ?, ?, ?, ?, ?, ?)';

	private const GET_COLUMNS = 'SHOW COLUMNS FROM artikelstammdaten';

	private const GET_PRODUCTGROUP = 'SELECT * FROM Productgroup';

	private const DELETE = 'DELETE FROM artikelstammdaten WHERE id = ?';

	private const GET_ONE = 'SELECT
				artikelstammdaten.id,
				artikelstammdaten.artikelnummer,
				artikelstammdaten.typ,
				artikelstammdaten.bezeichnung,
				artikelstammdaten.spezifikation,
				artikelstammdaten.erwSpezifikation,
				artikelstammdaten.hersteller,
				artikelstammdaten.bestand,
				artikelstammdaten.warengruppe
				FROM artikelstammdaten
				LEFT JOIN Productgroup on artikelstammdaten.warengruppe = Productgroup.id
				WHERE artikelstammdaten.id = ?';

	private const UPDATE = 'UPDATE artikelstammdaten SET 
            	artikelnummer = ?,
				typ = ?, 
				bezeichnung = ?,
				spezifikation = ?,
				erwSpezifikation = ?,
				hersteller = ?,
				bestand = ?,
				warengruppe = ?
				WHERE id = ?';

	public function __construct()
	{
		$this->database = new DatabaseClass();
	}

	/**
	 * @return array|mixed
	 */
	public function getAll()
	{
		return $this->database->select(self::GET_ALL, $parameter = null);
	}

	/**
	 * @param string $id
	 * @return array
	 */
	public function getOne(string $id): array
	{
		return $this->database->selectOne(self::GET_ONE, $id);
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
	 * @return array
	 */
	public function getProductgroup(): array
	{
		return $this->database->select(self::GET_PRODUCTGROUP, $parameter = null);
	}

	/**
	 * @return array
	 */
	public function getColumns(): array
	{
		return $this->database->getColumns(self::GET_COLUMNS);
	}

	/**
	 * @param array $data
	 */
	public function new(array $data): void
	{
		$this->database->insert(self::NEW, $data);
	}

	/**
	 * @param array $data
	 */
	public function update(array $data, array $productgroup = null)
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

}

