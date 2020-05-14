<?php

namespace MWP\Model\Entity;

use MWP\Src\DatabaseClass;
use mysqli_result;
use mysqli;

class Productgroup
{
	public mysqli_result $result;
	private array $columns;
	private mysqli $conn;

	/**
	 * Productgroup constructor.
	 */
	public function __construct()
	{
		$database = new DatabaseClass();
		$this->conn = $database->dbConnect();
	}

	public function getAll()
	{
		$sql = 'SELECT * FROM productgroup';
		$this->result = $this->conn->query($sql);
		$this->conn->close();
		if ($this->result->num_rows <= 0) {
			return [];
		}
		return $this->result->fetch_all(MYSQLI_ASSOC);
	}

	public function getOne($id)
	{
		$sql = "SELECT * FROM productgroup WHERE id = '$id'";
		$this->result = $this->conn->query($sql);
		$this->conn->close();
		if ($this->result->num_rows <= 0){
			return [];
		}
		$data = $this->result->fetch_all(MYSQLI_ASSOC);
		return $data[0];
	}

	public function new(array $data): void
	{
		if (!empty($data)) {
			$warengruppe = $data['warengruppe'];
			$sql = "INSERT INTO productgroup (warengruppe) VALUES ('$warengruppe')";
			$this->conn->query($sql);
			$this->conn->close();
		}
	}

	public function delete($id)
	{
		$sql = "DELETE FROM productgroup WHERE id = '$id'";
		$this->conn->query($sql);
		$this->conn->close();
	}

	public function getColumns()
	{
		$sql = 'SHOW COLUMNS FROM Productgroup';
		$this->result = $this->conn->query($sql);

		if ($this->result->num_rows <= 0){
			echo 'Es stehen keine Daten zur Verfügung!';
			return [];
		}

		foreach ($this->result as $key => $value) {
			$this->columns [] = $value['Field'];
		}
		return $this->columns;
	}

	public function update($data)
	{
		$id = $data['id'];
		$warengruppe = $data['warengruppe'];
		$sql = "UPDATE productgroup SET warengruppe = '$warengruppe' WHERE id = '$id'";
		$this->conn->query($sql);
		$this->conn->close();
	}

	public function getSearchValue(string $methodParam)
	{
		$sql = "SELECT id, warengruppe
		FROM productgroup
		WHERE warengruppe LIKE '%$methodParam%'";
		$this->result = $this->conn->query($sql);
		if ($this->result->num_rows <= 0){
			return [];
		}

		return $this->result->fetch_all(MYSQLI_ASSOC);
	}
}