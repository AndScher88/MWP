<?php


namespace MWP\Controller;

use MWP\Model\Entity\Dataportal;
use MWP\Model\Table;
use MWP\Model\WeatherView;

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
	 * @param WeatherView $weatherView
	 */
	public function __construct(Dataportal $dataportal, WeatherView $weatherView)
	{
		$this->dataportal = $dataportal;
		$this->weatherView = $weatherView;
	}

	/**
	 * @param array $methodParameter
	 */
	public function espData(array $methodParameter): void
	{
		$values = explode('&', $methodParameter);
		foreach ($values as $key => $value) {
			$methodParameter[$key] = $value;
		}
		$date = date('Y-m-d H:i:s');
		$this->dataportal->save($methodParameter, $date);
	}

	/**
	 *
	 */
	public function showWeather(): void
	{
		$temperature = '';
		$date = '"';
		if (!isset($_SESSION['login']) || $_SESSION['login'] === '') {
			header('Location: /account/login');
		} else {
			$weatherData = $this->dataportal->getWeather($parameter = null);
			foreach ($weatherData as $data) {
				$date .= $data['datum'] . '","';
				$temperature .= $data['temperatur'] . ',';
			}
			$date = substr($date, 0, -1);
			$temperature = substr($temperature,0, -1);
			echo $this->weatherView->render($temperature, $date);
		}
	}
}