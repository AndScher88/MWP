<?php

namespace MWP\Model\Entity;

use mysqli;
use mysqli_result;
use MWP\Src\DatabaseClass;

class Article
{
	public mysqli_result $result;
	private array $columns;
	private mysqli $conn;

	private const GET_ALL = 'SELECT
       	artikelstammdaten.id,
       	artikelstammdaten.artikelnummer, 
       	artikelstammdaten.typ,
       	artikelstammdaten.bezeichnung, 
       	artikelstammdaten.spezifikation,
       	artikelstammdaten.hersteller,
       	artikelstammdaten.bestand
		FROM artikelstammdaten';


	/** @var DatabaseClass */

	public function __construct()
	{
		$database = new DatabaseClass();
		$this->conn = $database->dbConnect();
	}

	/**
	 * @return array|mixed
	 */
	public function getAll()
	{
		$this->result = $this->conn->query(self::GET_ALL);
		if ($this->result->num_rows <= 0) {
			echo '<p>Es stehen keine Daten zur Verfügung!</p>';
			return [];
		}
		return $this->result->fetch_all(MYSQLI_ASSOC);
	}

	/**
	 * @param string $searchValue
	 * @return array
	 */
	public function getSearchValue(string $searchValue): array
	{
		$sql = "SELECT
			artikelstammdaten.id,
			artikelstammdaten.artikelnummer,
			artikelstammdaten.typ,
			artikelstammdaten.bezeichnung,
			artikelstammdaten.spezifikation,
			artikelstammdaten.erwSpezifikation,
			artikelstammdaten.hersteller,
			artikelstammdaten.bestand
			FROM artikelstammdaten
			WHERE
			artikelnummer LIKE '%$searchValue%' OR
			typ LIKE '%$searchValue%' OR
			bezeichnung LIKE '%$searchValue%' OR
			spezifikation LIKE '%$searchValue%' OR
			erwSpezifikation LIKE '%$searchValue%' OR
			hersteller LIKE '%$searchValue%'";

		$this->result = $this->conn->query($sql);
		if ($this->result->num_rows <= 0) {
			return [];
		}
		return $this->result->fetch_all(MYSQLI_ASSOC);
	}

	/**
	 * @param array $data
	 */
	public function create(array $data): void
	{
		if (array_key_exists('id', $data)){
			unset($data['id']);
	}

		if (!empty($data)) {
			$artikelnummer = $data['artikelnummer'];
			$typ = $data['typ'];
			$bezeichnung = $data['bezeichnung'];
			$spezifikation = $data['spezifikation'];
			$erw_spezi = $data['erwSpezifikation'];
			$hersteller = $data['hersteller'];
			$bestand = $data['bestand'];
			$warengruppe = $data['warengruppe'];

			$sql = "INSERT INTO artikelstammdaten (
                            artikelnummer, typ,  bezeichnung, spezifikation, erwSpezifikation, 
                            hersteller, bestand, warengruppe)
                	VALUES  ('$artikelnummer', '$typ', '$bezeichnung', '$spezifikation', '$erw_spezi', '$hersteller', '$bestand', '$warengruppe')";

			$this->conn->query($sql);
			$this->conn->close();
		}

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
		$this->result = $this->conn->query($sql);
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

