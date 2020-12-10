<?php


namespace MWP\Controller;

use MWP\Model\Entity\Dataportal;
use MWP\Model\Table;

/**
 * Class DataportalController
 * @package MWP\Controller
 */
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
		'deleteLink' => '',
		'detailLink' => '',
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

	/**
	 * @param array $methodParameter
	 */
	public function espData(array $methodParameter): void
	{
		$date = date('Y-m-d H:i:s');
		$this->dataportal->save($methodParameter, $date);
	}

	/**
	 *
	 */
	public function showWeather(): void
	{
		if (!isset($_SESSION['login']) || $_SESSION['login'] === '') {
			header('Location: /account/login');
		} else {
			$result = $this->dataportal->getWeather($parameter = null);
			$this->table->render($result, self::CONFIG_TABLE);
		}
	}
}