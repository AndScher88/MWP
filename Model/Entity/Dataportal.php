<?php


namespace MWP\Model\Entity;


use Cassandra\Date;
use MWP\Src\DatabaseClass;

class Dataportal
{
	/** @var DatabaseClass */
	private DatabaseClass $database;

	private const NEW = '
				INSERT INTO temperatur_esp (
                name, temperatur, luftfeuchtigkeit, datum
                )
                VALUES (:name, :temperatur, :luftfeuchtigkeit, :datum)';

	private const GET_LATEST = 'SELECT * FROM temperatur_esp ORDER BY id DESC LIMIT 1';

	/**
	 * Dataportal constructor.
	 * @param DatabaseClass $database
	 */
	public function __construct(DatabaseClass $database)
	{
		$this->database = $database;
	}

	public function save(array $data, $date)
	{
		$data['datum'] = $date;
		$this->database->insert(self::NEW, $data);
	}

	public function getWeather(?string $parameter)
	{
		return $this->database->select(self::GET_LATEST, $parameter);
	}

}