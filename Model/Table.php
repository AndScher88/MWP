<?php

namespace MWP\Model;

/**
 * Class Table
 * @package MWP\Model
 */
class Table implements Output
{
	private bool $head = false;
	private array $config;
	private ?string $methodParam;

	/**
	 * @param array $alldata
	 * @param array $config
	 * @param null $methodParam
	 */
	public function render(array $alldata, array $config, $methodParam = null): void
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$this->config = $config;
		$this->methodParam = $methodParam;
		$this->head();
		$this->searchField();
		if (empty($alldata)) {
			echo '<p>Keine Daten!</p>';
			return;
		}
		ob_start();
		echo '<table class="container content-table">';
		foreach ($alldata as $item) {
			if ($this->head === false) {
				$this->createTableHead($item);
			}
			$this->createTableBody($item);
		}
		echo '</table></body>';
		ob_end_flush();
	}

	public function head(): void
	{
		echo '<br>';
		echo '<h1 style="text-align: center">' . $this->config['title'] . '</h1>';
		echo '<br>';
	}

	public function searchField(): void
	{
		echo '<form method="get" action="' . $this->config['actionSearch'] . '" class="search">';
		if ($this->methodParam !== null) {
			echo '<p class="container">Hier sind die Ergebnisse zu: ' . $this->methodParam . ' !</p>';
			echo '<br>';
		}
		echo '<label for="suchen"></label>';
		echo '<input class="search-input" id="suchen" type="search" name="value" autofocus="autofocus"/>';
		echo '<input class="search-btn" type="submit" value="Suchen">';
		echo '</form>';
	}

	/**
	 * @param $data
	 */
	public function createTableHead($data)
	{
		echo '<thead><tr>';
		echo '<th></th><th></th>';

		$test = array_keys($data);
		foreach ($test as $key) {
			if ($key === 'id') {
				continue;
			}
			echo '<th>' . ucfirst($key) . '</th>';
		}
		echo '</tr></thead>';
		$this->head = true;
	}

	/**
	 * @param $data
	 */
	public function createTableBody($data): void
	{
		echo '<tr>';
		echo '<td width="50px"> <a href="' . $this->config['editLink'] . '?id=' . $data['id'] . '">';
		echo '<Img Src="/View/Img/edit.png" width="16" height="16" class="d-inline-block align-top" alt="">';
		echo '</td>';
		echo '<td width="50px"><a href="' . $this->config['deleteLink'] . '?id=' . $data['id'] . '">';
		echo '<Img Src="/View/Img/delete.png" width="16" height="16" class="d-inline-block align-top" alt=""></td>';
		foreach ($data as $key => $value) {
			if ($key === 'id') {
				continue;
			}
			echo '<td>' . $this->cleanOutput($value) . '</td>';
		}
		echo '</tr>';
	}

	/**
	 * @param $parameter
	 * @param string $encoding
	 * @return string
	 */
	public function cleanOutput($parameter, $encoding = 'utf-8'): string
	{
		return htmlentities(strip_tags($parameter), ENT_QUOTES | ENT_HTML5, $encoding);
	}
}
