<?php

namespace MWP\Model;

/**
 * Class Detail
 * @package MWP\Model
 */
class Detail
{
	/**
	 * @param array $data
	 */
	public function render(array $data): void
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		echo '<div class="container">';
		echo '<br>';
		echo '<div class="grid-container">';
		$this->details($data);
		echo '</div>';
		echo '<br>';
		$this->documents();
		echo '</div>';
	}

	/**
	 * @param array $data
	 */
	private function details(array $data): void
	{
		foreach ($data as $key => $value) {
			if ($key === 'id') {
				continue;
			}
			echo '<div class="grid-item"><p class="detail-value">' . htmlspecialchars(ucfirst($key)) . ': ' . '</p>'
				. '<p class="detail-value">' . htmlspecialchars($value) . '</p>' . '</div>';
		}
	}

	private function documents()
	{
		//TODO: Hier sollen Links zu möglicher Dokumentation angezeit werden
	}
}
