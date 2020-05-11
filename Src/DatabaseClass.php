<?php


namespace MWP\Src;


use http\Exception\BadMethodCallException;
use mysqli;

class DatabaseClass
{
	/** @var string */
	public string $connectionString;

	/** @var string */
	private const HOSTNAME = 'localhost';

	/** @var string */
	private const USERNAME = 'root';

	/** @var string */
	private const PASSWORD = '';

	/** @var string */
	private const DB_NAME = 'mwp-systems';
	/**
	 * @var DatabaseClass
	 */

	public function __construct()
	{
		$this->dbConnect();
	}

	public function dbConnect()
	{
		return new mysqli(
			self::HOSTNAME,
			self::USERNAME,
			self::PASSWORD,
			self::DB_NAME
		);
	}

}