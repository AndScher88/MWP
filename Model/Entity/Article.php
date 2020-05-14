<?php

namespace MWP\Model\Entity;

use mysqli;
use mysqli_result;
use MWP\Src\DatabaseClass;

class Article
{
	public mysqli_result $result;
	private array $columns;
	/** @var mysqli */
	private mysqli $conn;
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

	private const GET_SEARCHVALUE = 'select * FROM artikelstammdaten
		where artikelnummer like ? or 
		typ like ? or 
		bezeichnung like ? or 
		spezifikation like ? or 
		erwSpezifikation like ? or 
		hersteller like ?
		';

	private const NEW = 'INSERT INTO artikelstammdaten (
                            artikelnummer, typ,  bezeichnung, spezifikation, erwSpezifikation, 
                            hersteller, bestand, warengruppe
                            )
                	VALUES  (?, ?, ?, ?, ?, ?, ?, ?)';

	public function __construct()
	{
		$this->database = new DatabaseClass();
	}

	/**
	 * @return array|mixed
	 */
	public function getAll()
	{
		return $this->database->getAll(self::GET_ALL);
	}

	/**
	 * @param string $searchValue
	 * @return array
	 */
	public function getSearchValue(string $searchValue): array
	{
		return $this->database->getSearchValue(self::GET_SEARCHVALUE, $searchValue);
	}

	/**
	 * @param array $data
	 */
	public function new(array $data): void
	{
		$this->database->new(self::NEW, $data);
	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function getOne(int $id): array
	{
		$sql = "SELECT
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
				WHERE artikelstammdaten.id = '$id'";
		$this->result = $this->conn->query($sql);

		if ($this->result->num_rows <= 0) {
			return [];
		}
		$data = $this->result->fetch_all(MYSQLI_ASSOC);

		return $data[0];
	}

	/**
	 * @param array $data
	 */
	public function update(array $data, array $productgroup = null)
	{
		$id = $data['id'];
		$artikelnummer = $data['artikelnummer'];
		$typ = $data['typ'];
		$bezeichnung = $data['bezeichnung'];
		$spezifikation = $data['spezifikation'];
		$erwSpezifikation = $data['erwSpezifikation'];
		$hersteller = $data['hersteller'];
		$bestand = $data['bestand'];
		$warengruppe = $data['warengruppe'];


		$sql = "UPDATE artikelstammdaten SET 
            	artikelnummer = '$artikelnummer',
				typ = '$typ', 
				bezeichnung = '$bezeichnung',
				spezifikation = '$spezifikation',
				erwSpezifikation = '$erwSpezifikation',
				hersteller = '$hersteller',
				bestand = '$bestand',
				warengruppe = $warengruppe
				WHERE id = $id
				";
		$this->conn->query($sql);
		$this->conn->close();
	}

	/**
	 * @return array
	 */
	public function getProductgroup(): array
	{
		$sql = 'SELECT * FROM Productgroup';
		$this->result = $this->conn->query($sql);
		if ($this->result->num_rows <= 0) {
			echo '<p>Es stehen keine Daten zur Verfügung!</p>';
			return [];
		}
		return $this->result->fetch_all(MYSQLI_ASSOC);
	}

	/**
	 * @return array
	 */
	public function getColumns(): array
	{
		$sql = 'SHOW COLUMNS FROM artikelstammdaten';
		$this->database->getColumns($sql);
		die();
		$this->result = $conn->query($sql);
		if ($this->result->num_rows <= 0) {
			echo '<p>Es stehen keine Daten zur Verfügung!</p>';
			return [];
		}

		foreach ($this->result as $key => $value) {
			$this->columns [] = $value['Field'];
		}
		return $this->columns;
	}

	/**
	 * @param int $id
	 */
	public function delete(int $id): void
	{
		$sql = "DELETE FROM artikelstammdaten WHERE id = '$id'";
		$this->conn->query($sql);
		$this->conn->close();
	}

}

