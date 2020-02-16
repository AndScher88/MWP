<?php

namespace classes\frontend;

use classes\employee\Employee;
use mysqli_result;

class Table
{
	private mysqli_result $result;
	private int $emplId;
	private bool $head = false;
	public string $showLink = '';
	public string $editLink = 'mitarbeiterbearbeiten.php';
	public string $deleteLink = 'mitarbeiterloeschen.php';


	public function __construct()
	{

	}

	public function create()
	{
		ob_start();
		echo '<table class="table table-secondary text-left">';
		while ($results = mysqli_fetch_assoc($this->result)) {
			$this->emplId = $results['id'];
			array_shift($results);
			if ($this->head === false) {
				$this->createTableHead($results);
			}
			$this->createTableBody($results);
		}
		echo '</table>';
		ob_end_flush();
	}

	/**
	 * @param array $results
	 * @return string
	 */
	private function createTableHead(array $results)
	{
		echo '<thead><tr>';
		echo '<th></th><th></th>';
		foreach (array_keys($results) as $key) {
			echo '<th>' . ucfirst($key) . '</th>';
		}
		echo '</tr></thead>';
		$this->head = true;
	}

	/**
	 * @param array $results
	 * @return string
	 */
	private function createTableBody(array $results)
	{
		echo '<tr>';
		echo '<td> <a href="' . $this->editLink . '?id=' . $this->emplId . '">';
		echo '<img src="bilder/edit.png" width="16" height="16" class="d-inline-block align-top" alt="">';
		echo '</td>';
		echo '<td><a href="' . $this->deleteLink . '?id=' . $this->emplId . '">';
		echo '<img src="bilder/delete.png" width="16" height="16" class="d-inline-block align-top" alt=""></td>';

		foreach ($results as $value) {
			echo '<td>' . $value . '</td>';
		}
		echo '</tr>';
	}

	/**
	 * @param mysqli_result $result
	 */
	public function setResult(mysqli_result $result): void
	{
		$this->result = $result;
	}
}

