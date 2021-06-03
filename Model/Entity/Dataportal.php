<?php

namespace MWP\Model\Entity;

use MWP\Src\DatabaseClass;

/**
 * Class Dataportal
 * @package MWP\Model\Entity
 */
class Dataportal
{
	/** @var DatabaseClass */
	private DatabaseClass $database;

	/** @var string */
	private const NEW = '
				INSERT INTO temperatur_esp (
                name, temperatur, luftfeuchtigkeit, datum
                )
                VALUES (:name, :temperatur, :luftfeuchtigkeit, :datum)';

	/** @var string  */
	private const GET_LATEST = 'SELECT * FROM temperatur_esp ORDER BY id DESC LIMIT 500';

	/**
	 * Dataportal constructor.
	 * @param DatabaseClass $database
	 */
	public function __construct(DatabaseClass $database)
	{
		$this->database = $database;
	}

	/**
	 * @param array $data
	 * @param $date
	 */
	public function save(array $data, $date): void
	{
		$data['datum'] = $date;
		$this->database->insert(self::NEW, $data);
	}

	/**
	 * @param string|null $parameter
	 * @return array
	 */
	public function getWeather(?string $parameter): array
	{
		return $this->database->select(self::GET_LATEST, $parameter);
	}
}
