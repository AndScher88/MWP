<?php

namespace MWP\Controller;


use MWP\Model\Form;
use MWP\Model\Table;
use MWP\Model\Entity\Article;

/**
 * Class ArticleController
 * @package MWP\Controller
 */
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
		'action' => '/article/saveNewArticle',
		'type' => 'new',
		'selectOption' => ['warengruppe','hersteller']
	];

	/** @var array */
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
	/** @var array */
	private array$masterData;

	/**
	 * ArticleController constructor.
	 * @param $data
	 */
	public function __construct($data)
	{
		$this->masterData = $data;
		$this->article = new Article();
		$this->table = new Table();
		$this->form = new Form();
	}

	/**
	 * @return string
	 */
	public function show(): string
	{
		$parameter = null;
		$result = $this->article->getAll($parameter);
		if ($result === null) {
			echo '<br><p style="color: red">Es liegen keine Daten vor!</p>';
		}
		$this->table->render($result, self::CONFIG_TABLE);
	}

	/**
	 * @param $methodParam
	 */
	public function search($methodParam): void
	{
		$result = $this->article->getSearchValue($methodParam);
		$this->table->render($result, self::CONFIG_TABLE, $methodParam);
	}

	/**
	 *
	 */
	public function newArticleForm(): void
	{
		$parameter = null;
		$columns = $this->article->getColumns();
		$flippedColumns = array_flip($columns);
		$optionDataSupplier = $this->optionDataToArray($this->article->getSupplier($parameter));
		$optionData = $this->optionDataToArray($this->article->getProductgroup($parameter));
		$flippedColumns['hersteller'] = $optionDataSupplier;
		$flippedColumns['warengruppe'] = $optionData;
		$this->form->render($flippedColumns, self::CONFIG_NEW);
	}

	public function saveNewArticle(): void
	{
		$this->article->new($this->masterData);
		header('Location: /article/show');
	}

	public function delete(): void
	{
		$this->article->delete((int)$this->masterData);
		header('Location: /article/show');
	}

	public function edit(): void
	{
		$parameter = null;
		$data = $this->article->getOne((int)$this->masterData);
		$selectKeySupplier = $data['hersteller'];
		$selectKeyProductgoup = $data['warengruppe'];
		$optionDataSupplier = $this->optionDataToArray($this->article->getSupplier($parameter));
		$optionData = $this->optionDataToArray($this->article->getProductgroup($parameter));
		$data['hersteller'] = $optionDataSupplier;
		$data['hersteller']['selectKey'] = (int)$selectKeySupplier;
		$data['warengruppe'] = $optionData;
		$data['warengruppe']['selectKey'] = (int)$selectKeyProductgoup;
		$this->form->render($data, self::CONFIG_EDIT);
	}

	/**
	 *
	 */
	public function update(): void
	{
		$this->article->update($this->masterData);
		echo 'Update war erfolgreich';
		header('Location: /article/show');
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function optionDataToArray(array $data): array
	{
		$optionData = null;
		foreach ($data as $value) {
			$masterData = array_values($value);
			$key = $masterData[0];
			$val = $masterData[1];
			$optionData[$key] = $val;
		}
		return $optionData;
	}

}