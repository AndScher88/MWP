<?php

namespace MWP\Model\Entity;

use MWP\Src\DatabaseClass;


class Productgroup
{
	private DatabaseClass $database;

	private const GET_ALL = 'SELECT * FROM productgroup';
	private const GET_ONE = 'SELECT * FROM productgroup WHERE id = :id';
	private const NEW = 'INSERT INTO productgroup (warengruppe) VALUES (:warengruppe)';
	private const GET_COLUMNS = 'SHOW COLUMNS FROM Productgroup';
	private const UPDATE = 'UPDATE productgroup SET warengruppe = :warengruppe WHERE id = :id';
	private const DELETE = 'DELETE FROM productgroup WHERE id = :id';
	private const GET_SEARCHVALUE = 'SELECT * FROM productgroup WHERE warengruppe LIKE :searchValue';

	/**
	 * Productgroup constructor.
	 * @param DatabaseClass $database
	 */
	public function __construct(DatabaseClass $database)
	{
		$this->database = $database;
	}

	/** @return array */
	public function getAll(): array
	{
		return $this->database->select(self::GET_ALL, $parameter = null);
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function getOne($id)
	{
		return $this->database->selectOne(self::GET_ONE, $id);
	}

	/** @param array $data */
	public function new(array $data): void
	{
		$this->database->insert(self::NEW, $data);
	}

	/** @param $id */
	public function delete($id): void
	{
		$this->database->delete(self::DELETE, $id);
	}

	/** @return mixed */
	public function getColumns()
	{
		return $this->database->getColumns(self::GET_COLUMNS);
	}

	/**
	 * @param array $data
	 * @param array|null $productgroup
	 */
	public function update(array $data, array $productgroup = null): void
	{
		$this->database->update(self::UPDATE, $data);
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
}