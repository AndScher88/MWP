<?php


namespace MWP\Controller;

Session_Start();

use MWP\Model\Entity\Dataportal;
use MWP\Model\Table;

class DataportalController
{
	/** @var Dataportal */
	private Dataportal $dataportal;
	/** @var Table */
	private Table $table;

	/** @var array */
	private const CONFIG_TABLE = [
		'title' => 'Wetterdaten',
		'actionSearch' => '',
		'editLink' => '',
		'deleteLink' => ''
	];

	/**
	 * DataportalController constructor.
	 * @param Dataportal $dataportal
	 * @param Table $table
	 */
	public function __construct(Dataportal $dataportal, Table $table)
	{
		$this->dataportal = $dataportal;
		$this->table = $table;
	}

	public function espData(array $methodParameter)
	{
		$date = date('Y-m-d H:i:s');
		$this->dataportal->save($methodParameter, $date);
	}

	public function showWeather()
	{
		$result = $this->dataportal->getWeather($parameter = null);
		$this->table->render($result, self::CONFIG_TABLE);
	}
}