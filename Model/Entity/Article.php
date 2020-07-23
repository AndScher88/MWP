<?php

namespace MWP\Model\Entity;

use MWP\Src\DatabaseClass;

class Article
{
	/** @var DatabaseClass */
	private DatabaseClass $database;

	/**
	 *  Select all data from table artikelstammdaten
	 */
	private const GET_ALL = 'SELECT
       			artikelstammdaten.id,
       			artikelstammdaten.artikelnummer, 
       			artikelstammdaten.typ,
       			artikelstammdaten.bezeichnung, 
       			artikelstammdaten.spezifikation,
       			lieferanten.firma,
       			artikelstammdaten.bestand
				FROM artikelstammdaten
				LEFT JOIN lieferanten on artikelstammdaten.hersteller = lieferanten.id';

	/**
	 * Select searchvalue from table artikelstammdaten
	 */
	private const GET_SEARCHVALUE = 'SELECT 
				artikelstammdaten.id,
       			artikelstammdaten.artikelnummer, 
       			artikelstammdaten.typ,
       			artikelstammdaten.bezeichnung, 
       			artikelstammdaten.spezifikation,
       			lieferanten.firma,
       			artikelstammdaten.bestand
				FROM 
				artikelstammdaten 
				LEFT JOIN lieferanten on artikelstammdaten.hersteller = lieferanten.id
				WHERE CONCAT(artikelnummer,
				typ, 
				bezeichnung, 
				spezifikation, 
				hersteller, 
				warengruppe) 
                LIKE :searchValue
		';

	/**
	 * Insert new dataset into table artikelstammdaten
	 */
	private const NEW = '
				INSERT INTO artikelstammdaten (
                artikelnummer, typ,  bezeichnung, spezifikation, erwSpezifikation, 
                hersteller, bestand, warengruppe, lagerort
                )
                VALUES (:artikelnummer, :typ, :bezeichnung, :spezifikation, :erwSpezifikation, :hersteller, :bestand,
                        :warengruppe, :lagerort)';

	/**
	 *  Select columns form table artikelstammdaten
	 */
	private const GET_COLUMNS = 'SHOW COLUMNS FROM artikelstammdaten';

	/**
	 *  Select all values form table productgroup
	 */
	private const GET_PRODUCTGROUP = 'SELECT * FROM Productgroup';

	/**
	 *  Select id and companyname form table lieferanten
	 */
	private const GET_SUPPLIER = 'SELECT id, firma FROM lieferanten';

	/**
	 *  Delete a dataset in the table artikelstammdaten where the id = id
	 */
	private const DELETE = 'DELETE FROM artikelstammdaten WHERE id = :id';

	/**
	 *  Select one dataset from table artikelstammdaten
	 */
	private const GET_ONE = 'SELECT
				artikelstammdaten.id,
				artikelstammdaten.artikelnummer,
				artikelstammdaten.typ,
				artikelstammdaten.bezeichnung,
				artikelstammdaten.spezifikation,
				artikelstammdaten.erwSpezifikation,
				artikelstammdaten.hersteller,
				artikelstammdaten.bestand,
				artikelstammdaten.warengruppe,
       			artikelstammdaten.lagerort
				FROM artikelstammdaten
				LEFT JOIN Productgroup on artikelstammdaten.warengruppe = Productgroup.id
				WHERE artikelstammdaten.id = :id';

	/**
	 *  Update the dataset in the table artikelstammdaten where id = id
	 */
	private const UPDATE = 'UPDATE artikelstammdaten SET 
            	artikelnummer = :artikelnummer,
				typ = :typ, 
				bezeichnung = :bezeichnung,
				spezifikation = :spezifikation,
				erwSpezifikation = :erwSpezifikation,
				hersteller = :hersteller,
				bestand = :bestand,
				warengruppe = :warengruppe,
                lagerort = :lagerort
				WHERE id = :id';

	/**
	 * Article constructor.
	 */
	public function __construct()
	{
		$this->database = new DatabaseClass();
	}

	/**
	 * @param string $parameter
	 * @return array
	 */
	public function getAll(?string $parameter): array
	{
		return $this->database->select(self::GET_ALL, $parameter);
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function getOne(int $id): array
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
	public function getProductgroup($parameter): array
	{
		return $this->database->select(self::GET_PRODUCTGROUP, $parameter);
	}

	/**
	 * @param $parameter
	 * @return array
	 */
	public function getSupplier($parameter): array
	{
		return $this->database->select(self::GET_SUPPLIER, $parameter);
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

}

