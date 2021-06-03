<?php


namespace MWP\Model;


class WeatherView
{
	/**
	 * @param string $temperature
	 * @return string
	 */
	public function render(string $temperature, string $date): string
	{
		return '<canvas id="myChart" style="width:100%;max-width:700px"></canvas>'
			. '';
	}
}