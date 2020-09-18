<?php

namespace MWP\Src;

use PDO;
use PDOException;

/**
 * Class DatabaseClass
 * @package MWP\Src
 */
class DatabaseClass
{
	/** @var string */
	private const DSN = 'mysql:dbname=mwp-systems;host=localhost';

	/** @var string */
	private const USERNAME = 'root';

	/** @var string */
	private const PASSWORD = '';

	/** @var PDO|null */
	private ?PDO $conn;

	/** @var DatabaseClass */

	public function __construct()
	{
		$this->conn = $this->dbConnect();
	}


	/**
	 * @return PDO
	 */
	public function dbConnect(): ?PDO
	{
		try {
			return new PDO(
				self::DSN,
				self::USERNAME,
				self::PASSWORD,
				[
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
				]
			);
		} catch (PDOException $exception) {
			throw new PDOException($exception->getMessage(), $exception->getCode());
		}
	}

	/**
	 * @param string $sql
	 * @param $searchParameter
	 * @return array
	 */
	public function select(string $sql, $searchParameter): array
	{
		$statement = $this->conn->prepare($sql);
		$statement->bindParam('searchValue', $searchParameter);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * @param string $sql
	 * @param int $id
	 * @return mixed
	 */
	public function selectOne(string $sql, int $id)
	{
		$statement = $this->conn->prepare($sql);
		if ($statement->bindParam('id', $id)) {
			$statement->execute();
		}
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * @param $sql
	 * @return mixed
	 */
	public function getColumns($sql)
	{
		$statement = $this->conn->query($sql);
		$result    = $statement->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $key => $value) {
			$columns [] = $value['Field'];
		}
		return $columns;
	}

	/**
	 * @param $sql
	 * @param $data
	 */
	public function insert($sql, $data): void
	{
		$statement = $this->conn->prepare($sql);

		if ($data) {
			foreach ($data as $key => $value) {
				$statement->bindValue($key, $value);
			}
			if ($statement->execute() === true) {
				$_SESSION['message'] = 'Die Daten wurden erfolgreich gespeichert!';
				$_SESSION['alert']   = 'limegreen';
			} else {
				$_SESSION['message'] = 'Es ist etwas schief gelaufen!';
				$_SESSION['alert']   = 'red';
			}
		}
	}

	/**
	 * @param $sql
	 * @param $id
	 */
	public function delete($sql, $id): void
	{
		$statement = $this->conn->prepare($sql);
		if ($statement) {
			$statement->bindParam('id', $id);
			if ($statement->execute() === true) {
				$_SESSION['message'] = 'Die Daten wurden erfolgreich gelöscht!';
				$_SESSION['alert']   = 'limegreen';
			} else {
				$_SESSION['message'] = 'Die Daten konnten nicht gelöscht werden!';
				$_SESSION['alert']   = 'red';
			}
		}
	}

	/**
	 * @param $sql
	 * @param $data
	 */
	public function update($sql, $data): void
	{
		$statement = $this->conn->prepare($sql);
		foreach ($data as $key => $value) {
			if ($key === 'id') {
				$id = $value;
				continue;
			}
			$statement->bindValue($key, $value);
		}
		$statement->bindValue('id', $id);
		if ($statement->execute() === true) {
			$_SESSION['message'] = 'Die Daten wurden erfolgreich bearbeitet!';
			$_SESSION['alert']   = 'limegreen';
		} else {
			$_SESSION['message'] = 'Da ist wohl was schief gelaufen!';
			$_SESSION['alert']   = 'red';
		}
	}
}
