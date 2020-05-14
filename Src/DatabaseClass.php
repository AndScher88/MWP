<?php

namespace MWP\Src;

use mysqli;

class DatabaseClass
{
	/** @var string */
	private const HOSTNAME = 'localhost';

	/** @var string */
	private const USERNAME = 'root';

	/** @var string */
	private const PASSWORD = '';

	/** @var string */
	private const DB_NAME = 'mwp-systems';
	private mysqli $conn;


	/**
	 * @var DatabaseClass
	 */

	public function __construct()
	{
		$this->conn = $this->dbConnect();
	}

	/**
	 * @return mysqli
	 */
	public function dbConnect()
	{
		$connectionString = new mysqli(
			self::HOSTNAME,
			self::USERNAME,
			self::PASSWORD,
			self::DB_NAME
		);

		if ($connectionString->connect_errno) {
			exit('Verbindung zur Datenbank ist fehlgeschlagen:('
				. $connectionString->connect_errno
				. ')' . $connectionString->connect_error);
		}

		return $connectionString;
	}

	public function select(string $sql)
	{
		$stmt = $this->conn->prepare($sql);
		if ($stmt) {
			$stmt->execute();
			$article = $stmt->get_result();
			$result = $article->fetch_all(MYSQLI_ASSOC);
		}
		return $result;
	}

	public function getone($sql, $id)
	{
		$statement = $this->conn->prepare($sql);
		if ($statement) {
			$statement->bind_param('i', $id);
			$statement->execute();
			$data = $statement->get_result();
			$result = $data->fetch_all(MYSQLI_ASSOC);
		}
		return $result[0];
	}

	public function getSearchValue($sql, $searchValue)
	{
		$searchValue = '%' . $searchValue . '%';
		if ($stmt = $this->conn->prepare($sql)) {
			$stmt->bind_param(
				's',
				$searchValue
			);
			$stmt->execute();
			$article = $stmt->get_result();
			$result = $article->fetch_all(MYSQLI_ASSOC);
		}
		return $result;
	}

	public function insert($sql, $data)
	{
		if (array_key_exists('id', $data)) {
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


			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param(
				'ssssssss',
				$artikelnummer,
				$typ,
				$bezeichnung,
				$spezifikation,
				$erw_spezi,
				$hersteller,
				$bestand,
				$warengruppe
			);
			$stmt->execute();
		}
	}

	public function getColumns($sql)
	{
		$stmt = $this->conn->prepare($sql);
		if ($stmt) {
			$stmt->execute();
			$article = $stmt->get_result();
			$result = $article->fetch_all(MYSQLI_ASSOC);
		}
		foreach ($result as $key => $value) {
			$columns [] = $value['Field'];
		}
		return $columns;
	}

	public function delete($sql, $id)
	{
		$statement = $this->conn->prepare($sql);
		if ($statement) {
			$statement->bind_param('i', $id);
			$statement->execute();
		}
	}

	public function update($sql, $data)
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

		$statement = $this->conn->prepare($sql);
		if ($statement) {
			$statement->bind_param(
				'ssssssisi',
				$artikelnummer,
				$typ,
				$bezeichnung,
				$spezifikation,
				$erwSpezifikation,
				$hersteller,
				$bestand,
				$warengruppe,
				$id
			);
			$statement->execute();
		}
	}
}