<?php

namespace MWP\Model;

/**
 * Class Form
 * @package MWP\Model
 */
class Form
{
	/** @var bool */
	private bool $newEntity;

	/**
	 * Form constructor.
	 */
	public function __construct()
	{
		$this->newEntity = false;
	}

	/**
	 * @param array $data
	 * @param array $config
	 */
	public function render(array $data, array $config): void
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		require_once 'View/Templates/flashMessage.php';
		if (empty($data)) {
			echo '<p class="container">Keine Daten!</p>';
			return;
		}

		if ($config['type'] === 'new') {
			$this->newEntity = true;
		}
		ob_start();

		$this->renderFormHead($config['title'], $config['action'], $config['headline']);

		foreach ($data as $key => $value) {
			if (in_array($key, $config['selectOption'], true)) {
				$this->buildSelect($key, $value);

				continue;
			}
			//default ->
			$this->buildInputText($key, (string)$value);
		}


		$this->renderFormFoot($config['actionName']);
		ob_end_flush();
	}


	/**
	 * @param string $key
	 * @param string $value
	 */
	private function buildInputText(string $key, string $value): void
	{
		if ($this->newEntity === false && $key === 'id') {
			echo '<input type="hidden" name="id" value="' . $value . '">';
			return;
		}

		if ($this->newEntity === true && $key === 'id') {
			return;
		}

		echo '<label id="' . $key . ' label" for="' . $key . '">' . ucfirst($key) . ':</label>';

		$row = '';
		if ($this->newEntity === false) {
			$row = 'value="' . $value . '"';
		}

		echo '<input type="text" name="' . $key . '" id="' . $key . '" aria-describedby="' . $key . 'label" '
			. $row . '>';
	}

	/**
	 * @param string $name
	 * @param array $optionData
	 */
	private function buildSelect(string $name, array $optionData): void
	{
		$selectKey = 1;
		if (array_key_exists('selectKey', $optionData)) {
			$selectKey = $optionData['selectKey'];
			unset($optionData['selectKey']);
		}
		echo '<label id="' . $name . ' label" for="' . $name . '">' . ucfirst($name) . ':</label>';
		echo '<select name="' . $name . '" id="' . $name . '">';
		foreach ($optionData as $key => $item) {
			if ($this->newEntity === false && $key === $selectKey) {
				echo '<option value="' . $key . '" selected>' . $item . '</option>';

				continue;
			}
			echo '<option value="' . $key . '">' . $item . '</option>';
		}
		echo '</select>';
	}


	/**
	 * @param string $title
	 * @param string $action
	 * @param string $headline
	 */
	private function renderFormHead(string $title, string $action, string $headline): void
	{
		echo '<div class="container">';
		echo '<br>';
		echo '<h1 style="text-align: center">' . $title . '</h1>';
		echo '<br>';
		echo '<form class="container-form" action="' . $action . '" method="post">';
		echo '<div>';
		echo '<label class="label-headline">' . $headline . ' </label>';
		echo '</div>';
		echo '<div class="form-form">';
		echo '<br>';
	}


	/**
	 * @param $actionName
	 */
	private function renderFormFoot($actionName): void
	{
		echo '<br>';
		echo '<div role="group" aria-label="speichern">';
		echo '<button class="submit-btn" value="submit">' . $actionName . '</button>';
		echo '</div>';
		echo '</div>';
		echo '</form>';
		echo '</div>';
	}
}