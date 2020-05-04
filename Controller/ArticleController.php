<?php

namespace MWP\Controller;


use MWP\Model\Form;
use MWP\Model\Table;
use MWP\Model\Entity\Article;

class ArticleController
{
	/** @var array */
	private const CONFIG_EDIT = [
		'title' => 'Artikel bearbeiten',
		'headline' => 'Bitte hier die neuen Daten des Artikels eingeben:',
		'action' => '/Article/update',
		'type' => '',
		'selectOption' => ['warengruppe']
	];

	/** @var array */
	private const CONFIG_NEW = [
		'title' => 'Artikel anlegen',
		'headline' => 'Bitte hier die Daten des neuen Artikels eingeben:',
		'action' => '/Article/new',
		'type' => 'new',
		'selectOption' => ['warengruppe']
	];

	private const CONFIG_TABLE = [
		'title' => 'Artikel übersicht',
		'actionSearch' => '/Article/search/',
		'editLink' => '/Article/edit/',
		'deleteLink' => '/Article/delete/'
	];

	public function __construct()
	{
	}

	public function show()
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$data = new Article();
		$result = $data->getAll();
		$table = new Table($result,self::CONFIG_TABLE);
		$table->render();
	}

	public function search($methodParam)
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$data = new Article();
		$result = $data->getSearchValue($methodParam);
		$table = new Table($result,self::CONFIG_TABLE, $methodParam);
		$table->render();
	}

	public function new()
	{
		#Abfrage der entsprechenden Tabelle nach den Spaltennamen
		#Form bauen
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';

		$article = new Article;
		$columns = $article->getColumns();
		$flippedColumns = array_flip($columns);
		$optionData = $this->getProductgroupOptionData($article);
		$flippedColumns['warengruppe'] = $optionData;
		$form = new Form($flippedColumns, self::CONFIG_NEW);
		$form->render();
		$masterData = $_POST;
		$data = new Article();
		$data->create($masterData);
	}

	public function delete()
	{
		// Hier wird irgendwas gelöscht
		$id = $_GET['id'];
		$article = new Article();
		$article->delete($id);
		header('Location: /Article/show');
	}

	public function edit()
	{
		$id = $_GET['id'];
		$article = new Article();
		$data = $article->getOne($id);
		$selectKey = $data['warengruppe'];
		$optionData = $this->getProductgroupOptionData($article);
		$data['warengruppe'] = $optionData;
		$data['warengruppe']['selectKey'] = (int)$selectKey;
		$form = new Form($data, self::CONFIG_EDIT);
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$form->render();
	}

	public function update()
	{
		$data = $_POST;
		$article = new Article();
		$article->update($data);
		echo 'Update war erfolgreich';
		header('Location: /Article/show');
	}

	/**
	 * @param Article $article
	 * @return array
	 */
	public function getProductgroupOptionData(Article $article): array
	{
		$optionDataArray = $article->getProductgroup();
		foreach ($optionDataArray as $value) {
			$masterData = array_values($value);
			$key = $masterData[0];
			$val = $masterData[1];
			$optionData[$key] = $val;
		}
		return $optionData;
	}

}