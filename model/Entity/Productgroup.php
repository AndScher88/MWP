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
		if ($this->result->num_rows <= 0) {
			return [];
		}
		return $this->result->fetch_all(MYSQLI_ASSOC);
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

	public function edit()
	{

	}

	public function delete()
	{

	}

	public function getColumns()
	{
		$conn = DatabaseConnector::getAccess();
		$sql = 'SHOW COLUMNS FROM productgroup';
		$this->result = $conn->query($sql);

		if ($this->result->num_rows <= 0){
			echo 'Es stehen keine Daten zur Verfügung!';
			return [];
		}

		foreach ($this->result as $key => $value) {
			$this->columns [] = $value['Field'];
		}
		return $this->columns;
	}
}