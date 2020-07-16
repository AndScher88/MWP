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
		'selectOption' => ['warengruppe','hersteller']
	];

	/** @var array */
	private const CONFIG_NEW = [
		'title' => 'Artikel anlegen',
		'headline' => 'Bitte hier die Daten des neuen Artikels eingeben:',
		'action' => '/article/new',
		'type' => 'new',
		'selectOption' => ['warengruppe','hersteller']
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

	public function show(): void
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$result = $this->article->getAll();
		if ($result === null) {
			exit('<br><p style="color: red">Es liegen keine Daten vor!</p>');
		}
		$this->table->render($result, self::CONFIG_TABLE);
	}

	public function search($methodParam): void
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$result = $this->article->getSearchValue($methodParam);
		$this->table->render($result, self::CONFIG_TABLE, $methodParam);
	}

	/**
	 *
	 */
	public function new(): void
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$columns = $this->article->getColumns();
		$flippedColumns = array_flip($columns);
		$optionDataSupplier = $this->optionDataToArray($this->article->getSupplier());
		$optionData = $this->optionDataToArray($this->article->getProductgroup());
		$flippedColumns['hersteller'] = $optionDataSupplier;
		$flippedColumns['warengruppe'] = $optionData;
		$this->form->render($flippedColumns, self::CONFIG_NEW);
		$masterData = $_POST;
		$this->article->new($masterData);
	}

	public function delete(): void
	{
		$id = $_GET['id'];
		$this->article->delete($id);
		header('Location: /article/show');
	}

	public function edit(): void
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$id = $_GET['id'];
		$data = $this->article->getOne($id);
		$selectKeySupplier = $data['hersteller'];
		$selectKeyProductgoup = $data['warengruppe'];
		$optionDataSupplier = $this->optionDataToArray($this->article->getSupplier());
		$optionData = $this->optionDataToArray($this->article->getProductgroup());
		$data['hersteller'] = $optionDataSupplier;
		$data['hersteller']['selectKey'] = (int)$selectKeySupplier;
		$data['warengruppe'] = $optionData;
		$data['warengruppe']['selectKey'] = (int)$selectKeyProductgoup;
		$this->form->render($data, self::CONFIG_EDIT);
	}

	public function update(): void
	{
		$data = $_POST;
		$this->article->update($data);
		echo 'Update war erfolgreich';
		header('Location: /article/show');
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function optionDataToArray(array $data): array
	{
		foreach ($data as $value) {
			$masterData = array_values($value);
			$key = $masterData[0];
			$val = $masterData[1];
			$optionData[$key] = $val;
		}
		return $optionData;
	}

}