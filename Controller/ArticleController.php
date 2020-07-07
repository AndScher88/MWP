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
		'action' => '/article/update',
		'type' => '',
		'selectOption' => ['warengruppe']
	];

	/** @var array */
	private const CONFIG_NEW = [
		'title' => 'Artikel anlegen',
		'headline' => 'Bitte hier die Daten des neuen Artikels eingeben:',
		'action' => '/article/new',
		'type' => 'new',
		'selectOption' => ['warengruppe']
	];

	private const CONFIG_TABLE = [
		'title' => 'Artikel übersicht',
		'actionSearch' => '/article/search/',
		'editLink' => '/article/edit/',
		'deleteLink' => '/article/delete/'
	];

	/** @var Article */
	private Article $article;
	/** @var Table */
	private Table $table;
	/** @var Form */
	private Form $form;

	public function __construct()
	{
		$this->article = new Article();
		$this->table = new Table();
		$this->form = new Form();
	}

	public function show()
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$result = $this->article->getAll();
		if ($result === null) {
			exit('<br><p style="color: red">Es liegen keine Daten vor!</p>');
		}
		$this->table->render($result, self::CONFIG_TABLE);
	}

	public function search($methodParam)
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$result = $this->article->getSearchValue($methodParam);
		$this->table->render($result, self::CONFIG_TABLE, $methodParam);
	}

	public function new()
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$columns = $this->article->getColumns();
		$flippedColumns = array_flip($columns);
		$optionData = $this->getProductgroupOptionData($this->article);
		$flippedColumns['warengruppe'] = $optionData;
		$this->form->render($flippedColumns, self::CONFIG_NEW);
		$masterData = $_POST;
		$this->article->new($masterData);
	}

	public function delete()
	{
		$id = $_GET['id'];
		$this->article->delete($id);
		header('Location: /article/show');
	}

	public function edit()
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$id = $_GET['id'];
		$data = $this->article->getOne($id);
		$selectKey = $data['warengruppe'];
		$optionData = $this->getProductgroupOptionData($this->article);
		$data['warengruppe'] = $optionData;
		$data['warengruppe']['selectKey'] = (int)$selectKey;
		$this->form->render($data, self::CONFIG_EDIT);
	}

	public function update()
	{
		$data = $_POST;
		$this->article->update($data);
		echo 'Update war erfolgreich';
		header('Location: /article/show');
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