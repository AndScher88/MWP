<?php

require_once 'model/src/DatabaseConnector.php';


class Productgroup
{
	public mysqli_result $result;
	private array $columns;

	/**
	 * Productgroup constructor.
	 */
	public function __construct()
	{
	}

	public function getAll()
	{
		$conn = DatabaseConnector::getAccess();
		$sql = 'SELECT * FROM productgroup';
		$this->result = $conn->query($sql);
		$conn->close();
		if ($this->result->num_rows <= 0) {
			return [];
		}
		return $this->result->fetch_all(MYSQLI_ASSOC);
	}

	public function getOne($id)
	{
		$conn = DatabaseConnector::getAccess();
		$sql = "SELECT * FROM productgroup WHERE id = '$id'";
		$this->result = $conn->query($sql);
		$conn->close();
		if ($this->result->num_rows <= 0){
			return [];
		}
		$data = $this->result->fetch_all(MYSQLI_ASSOC);
		return $data[0];
	}

	public function new(array $data)
	{
		if (!empty($data)) {
			$warengroup = $data['warengruppe'];
			$conn = DatabaseConnector::getAccess();
			$sql = "INSERT INTO productgroup (warengruppe) VALUES ('$warengroup')";
			$conn->query($sql);
			$conn->close();
		}
	}

	public function delete($id)
	{
		$conn = DatabaseConnector::getAccess();
		$sql = "DELETE FROM productgroup WHERE id = '$id'";
		$conn->query($sql);
		$conn->close();
	}

	public function getColumns()
	{
		$conn = DatabaseConnector::getAccess();
		$sql = 'SHOW COLUMNS FROM productgroup';
		$this->result = $conn->query($sql);
		$conn->close();

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
		$conn = DatabaseConnector::getAccess();
		$sql = "UPDATE productgroup SET warengruppe = '$warengruppe' WHERE id = '$id'";
		$conn->query($sql);
		$conn->close();
	}
}