<?php

namespace MWP\Src;

use mysqli;
use mysqli_result;

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
	private mysqli_result $result;

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

	public function select(string $sql, $parameter)
	{
		$statement = $this->conn->prepare($sql);
		if ($parameter !== null) {
			$statement->bind_param('s', $parameter);
		}
		$statement->execute();
		$this->result = $statement->get_result();
		return $this->result->fetch_all(MYSQLI_ASSOC);
	}

	public function selectOne(string $sql, $parameter)
	{
		$statement = $this->conn->prepare($sql);
		if ($parameter !== null) {
			$statement->bind_param('s', $parameter);
		}
		$statement->execute();
		$this->result = $statement->get_result();
		$result = $this->result->fetch_all(MYSQLI_ASSOC);

		return $result[0];
	}

	public function getColumns($sql)
	{
		$statement = $this->conn->prepare($sql);
		$statement->execute();
		$data = $statement->get_result();
		$result = $data->fetch_all(MYSQLI_ASSOC);

		foreach ($result as $key => $value) {
			$columns [] = $value['Field'];
		}
		return $columns;
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
			$this->bindParam($stmt, $data);
			$stmt->execute();
		}
	}

	private function bindParam($stmt, $parameter)
	{
		$type = '';
		foreach ($parameter as $value) {
			switch (gettype($value)) {
				case 'integer':
					$type .= 'i';
					break;
				case 'double':
					$type .= 'd';
					break;
				case 'string':
					$type .= 's';
					break;
				case null:
					break;
			}
		}
		$param = [];
		foreach ($parameter as $value) {
			$param [] = $value;
		}
		//echo $param;
		return $stmt->bind_param($type, $param);
	}

	public
	function delete($sql, $id)
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