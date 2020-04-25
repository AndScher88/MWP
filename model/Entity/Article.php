<?php

require_once 'model/src/DatabaseConnector.php';
require_once 'model/Table.php';
require_once 'model/foo.php';

class Article
{
	public mysqli_result $result;
	private array $columns;

	private const GET_ALL = 'SELECT
       	artikelstammdaten.id,
       	artikelstammdaten.artikelnummer, 
       	artikelstammdaten.typ,
       	artikelstammdaten.bezeichnung, 
       	artikelstammdaten.spezifikation,
       	artikelstammdaten.hersteller,
       	artikelstammdaten.bestand
		FROM artikelstammdaten';

	private const EDIT = 'SELECT
				artikelstammdaten.id,
				artikelstammdaten.artikelnummer,
				artikelstammdaten.typ,
				artikelstammdaten.bezeichnung,
				artikelstammdaten.spezifikation,
				artikelstammdaten.erwSpezifikation,
				artikelstammdaten.hersteller,
				artikelstammdaten.bestand,
				productgroup.groupName as Warengruppe
				FROM artikelstammdaten
				LEFT JOIN productgroup on artikelstammdaten.warengruppe = productgroup.id
				WHERE artikelstammdaten.id = $id';


	/**
	 * @return array|mixed
	 */
	public function getAll()
	{
		$conn = DatabaseConnector::getAccess();
		$this->result = $conn->query(self::GET_ALL);
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
		$conn = DatabaseConnector::getAccess();
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

		$this->result = $conn->query($sql);
		if ($this->result->num_rows <= 0) {
			return [];
		}
		return $this->result->fetch_all(MYSQLI_ASSOC);
	}

	/**
	 * @param array $data
	 */
	public function createArticle(array $data): void
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

			$conn = DatabaseConnector::getAccess();
			$sql = "INSERT INTO artikelstammdaten (
                            artikelnummer, typ,  bezeichnung, spezifikation, erwSpezifikation, 
                            hersteller, bestand, warengruppe)
                	VALUES  ('$artikelnummer', '$typ', '$bezeichnung', '$spezifikation', '$erw_spezi', '$hersteller', '$bestand', '$warengruppe')";

			$conn->query($sql);
			$conn->close();
		}

	}

	/**
	 * @param int $id
	 * @return array
	 */
	public function getOne(int $id): array
	{
		$conn = DatabaseConnector::getAccess();
		$sql = "SELECT
				artikelstammdaten.id,
				artikelstammdaten.artikelnummer,
				artikelstammdaten.typ,
				artikelstammdaten.bezeichnung,
				artikelstammdaten.spezifikation,
				artikelstammdaten.erwSpezifikation,
				artikelstammdaten.hersteller,
				artikelstammdaten.bestand,
				artikelstammdaten.warengruppe,
				productgroup.groupName as Warengruppe
				FROM artikelstammdaten
				LEFT JOIN productgroup on artikelstammdaten.warengruppe = productgroup.id
				WHERE artikelstammdaten.id = '$id'";
		$this->result = $conn->query($sql);

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


		$conn = DatabaseConnector::getAccess();
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
		$conn->query($sql);
		$conn->close();
	}

	/**
	 * @return array
	 */
	public function getProductgroup(): array
	{
		$conn = DatabaseConnector::getAccess();
		$sql = 'SELECT * FROM productgroup';
		$this->result = $conn->query($sql);
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
		$conn = DatabaseConnector::getAccess();
		$sql = 'SHOW COLUMNS FROM artikelstammdaten';
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
		$conn = DatabaseConnector::getAccess();
		$sql = "DELETE FROM artikelstammdaten WHERE id = '$id'";
		$conn->query($sql);
		$conn->close();
	}

}

