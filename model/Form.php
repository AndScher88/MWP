<?php
require_once 'model/src/DatabaseConnector.php';

class Form
{

	private string $id;
	private array $data;
	private array $groupdata;
	private string $parameter;
	private int $groupName_id;

	public function __construct($data, $groupData, $parameter)
	{
		$this->data = $data;
		$this->groupdata = $groupData;
		$this->parameter = $parameter;
	}

	public function render()
	{
		if (empty($this->data)) {
			echo 'Keine Daten!';
			exit;
		}
		ob_start();
		$this->renderFormHead();
		if ($this->parameter === 'Artikel bearbeiten'){
			$this->buildEditRow($this->data);
		}
		if ($this->parameter === 'Artikel anlegen'){
			$this->buildCreateRow($this->data);
		}
		$this->renderFormFoot();
		ob_end_flush();
	}

	private function renderFormHead()
	{
		echo '<div class="container">';
		echo '<br>';
		echo '<h1 style="text-align: center">Artikel anlegen</h1>';
		echo '<br>';
		echo '<form class="container-form" action="/article/update" method="post">';
		echo '<div>';
		echo '<label class="label-headline">Bitte hier die Daten des neuen Artikels eingeben: </label>';
		echo '</div>';
		echo '<div class="form-form">';
	}

	private function renderFormFoot()
	{
		echo '<br>';
		echo '<div role="group" aria-label="hinzufügen">';
		echo '<button class="submit-btn" value="submit">Artikel speichern</button>';
		echo '</div>';
		echo '</div>';
		echo '</form>';
		echo '</div>';
	}

	/**
	 * @param array $data
	 */
	private function buildEditRow(array $data)
	{
		foreach ($data as $key => $value) {
			if ($key === 'id') {
				$this->id = $value;
				continue;
			}
			if ($key === 'warengruppe'){
				$this->groupName_id = $value;
				continue;
			}
			if ($key === 'Warengruppe'){
				echo '<label id="'. $key . 'label" for="'. $key . '">' . ucfirst($key) . ':</label>';
				$groupName = $value;
				$this->buildEditSelect($groupName, $this->groupName_id);
				continue;
			}
			echo '<label id="'. $key . 'label" for="'. $key . '">' . ucfirst($key) . ':</label>';
			echo '<input type="text" name="'. $key . '" id="'. $key . '" aria-describedby="'. $key . 'label" value="' . $value . '">';
		}
		echo '<input type="hidden" name="id" value="' . $this->id .'"';
	}

	/**
	 * @param $groupName
	 * @param $groupName_id
	 */
	private function buildEditSelect($groupName, $groupName_id): void
	{
		echo '<select name="warengruppe" id="warengruppe">';
		echo '<option value="'. $groupName_id .'">'. $groupName .'</option>';
		foreach ($this->groupdata as $key => $value) {
			echo '<option value="'. $value['id'] . '">'. $value['groupName'] . '</option>';
		}
		echo '</select>';
	}

	public function buildCreateRow($columns)
	{

	}


}