<?php

require_once 'foo.php';

class Table implements foo
{
	protected array $data;
	private bool $head = false;
	public string $editLink = '/article/edit/';
	public string $deleteLink = '/article/delete/';

	public function __construct(array $alldata)
	{
		$this->data = $alldata;
	}


	public function render()
	{
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
		echo '<td width="50px"> <a href="' . $this->editLink . '?id=' . $data['id'] . '">';
		echo '<img src="/view/img/edit.png" width="16" height="16" class="d-inline-block align-top" alt="">';
		echo '</td>';
		echo '<td width="50px"><a href="' . $this->deleteLink . '?id=' . $data['id'] . '">';
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

