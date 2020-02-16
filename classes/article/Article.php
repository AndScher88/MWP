<?php

namespace classes\article;

use classes\database\DatabaseConnector;
use mysqli_result;
use classes\frontend\Table;

class Article
{
	public mysqli_result $result;
	public string $artikelnummer;
	public string $benennung;


	public function alleArtikel()
	{
		$conn = DatabaseConnector::getAccess();
		$sql = 'SELECT * FROM artikeldaten ORDER BY id';
		$this->result = $conn->query($sql);
		$conn->close();
	}

	/**
	 * @return mysqli_result
	 */
	public function getResult(): mysqli_result
	{
		return $this->result;
	}


}