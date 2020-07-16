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
       			lieferanten.firma,
       			artikelstammdaten.bestand
				FROM artikelstammdaten
				LEFT JOIN lieferanten on artikelstammdaten.hersteller = lieferanten.id';

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

	private const NEW = '
				INSERT INTO artikelstammdaten (
                artikelnummer, typ,  bezeichnung, spezifikation, erwSpezifikation, 
                hersteller, bestand, warengruppe
                )
                VALUES  (:artikelnummer, :typ, :bezeichnung, :spezifikation, :erwSpezifikation, :hersteller, :bestand, :warengruppe)';

	private const GET_COLUMNS = 'SHOW COLUMNS FROM artikelstammdaten';

	private const GET_PRODUCTGROUP = 'SELECT * FROM Productgroup';

	private const GET_Supplier = 'SELECT id, firma FROM lieferanten';

	private const DELETE = 'DELETE FROM artikelstammdaten WHERE id = :id';

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
				WHERE artikelstammdaten.id = :id';

	private const UPDATE = 'UPDATE artikelstammdaten SET 
            	artikelnummer = :artikelnummer,
				typ = :typ, 
				bezeichnung = :bezeichnung,
				spezifikation = :spezifikation,
				erwSpezifikation = :erwSpezifikation,
				hersteller = :hersteller,
				bestand = :bestand,
				warengruppe = :warengruppe
				WHERE id = :id';

	/**
	 * Article constructor.
	 */
	public function __construct()
	{
		$this->database = new DatabaseClass();
	}

	/**
	 * @return array|mixed
	 */
	public function getAll(): array
	{
		return $this->database->select(self::GET_ALL, $parameter = null);
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
	public function getProductgroup(): array
	{
		return $this->database->select(self::GET_PRODUCTGROUP, $parameter = null);
	}

	public function getSupplier(): array
	{
		return $this->database->select(self::GET_Supplier, $parameter = null);
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

