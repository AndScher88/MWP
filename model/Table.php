<?php

require_once 'foo.php';

class Table implements foo
{
	protected array $data;
	private bool $head = false;
	private array $config;
	private $methodParam;

	public function __construct(array $alldata, array $config, $methodParam = null)
	{
		$this->data = $alldata;
		$this->config = $config;
		$this->methodParam = $methodParam;
	}

	public function head()
	{
		echo '<br>';
		echo '<h1 style="text-align: center">' . $this->config['title'] . '</h1>';
		echo '<br>';
	}

	public function searchField()
	{
		echo '<form method="get" action="'. $this->config['actionSearch'] .'" class="search">';
		if ($this->methodParam !== null) {
			echo '<p class="container">Hier sind die Ergebnisse zu: ' . $this->methodParam . ' !</p>';
			echo '<br>';
		}
		echo '<label for="suchen"></label>';
		echo '<input class="search-input" id="suchen" type="search" name="value" autofocus="autofocus"/>';
		echo '<input class="search-btn" type="submit" value="Suchen">';
		echo '</form>';
	}

	public function render()
	{
		$this->head();
		$this->searchField();
		if (empty($this->data)) {
			echo 'Keine Daten!';
			exit;
		}
		ob_start();
		echo '<table class="container content-table">';
		foreach ($this->data as $item) {
			if ($this->head === false) {
				$this->createTableHead($item);
			}
			$this->createTableBody($item);
		}
		echo '</table></body>';
		ob_end_flush();
	}

	public function createTableHead($data)
	{
		echo '<thead><tr>';
		echo '<th></th><th></th>';
		foreach ($data as $key => $value) {
			if ($key === 'id') {
				//$this->id = $key;
				continue;
			}
			echo '<th>' . ucfirst($key) . '</th>';
		}
		echo '</tr></thead>';
		$this->head = true;
	}

	public function createTableBody($data)
	{
		echo '<tr>';
		echo '<td width="50px"> <a href="' . $this->config['editLink'] . '?id=' . $data['id'] . '">';
		echo '<img src="/view/img/edit.png" width="16" height="16" class="d-inline-block align-top" alt="">';
		echo '</td>';
		echo '<td width="50px"><a href="' . $this->config['deleteLink'] . '?id=' . $data['id'] . '">';
		echo '<img src="/view/img/delete.png" width="16" height="16" class="d-inline-block align-top" alt=""></td>';
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

