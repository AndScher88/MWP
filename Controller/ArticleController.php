<?php

namespace MWP\Controller;

Session_Start();

use MWP\Model\Detail;
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
		'selectOption' => ['warengruppe', 'hersteller']
	];

	/** @var array */
	private const CONFIG_NEW = [
		'title' => 'Artikel anlegen',
		'headline' => 'Bitte hier die Daten des neuen Artikels eingeben:',
		'action' => '/article/save',
		'type' => 'new',
		'selectOption' => ['warengruppe', 'hersteller']
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
	/** @var Detail */
	private Detail $detail;

	/**
	 * ArticleController constructor.
	 * @param Article $article
	 * @param Table $table
	 * @param Form $form
	 * @param Detail $detail
	 */
	public function __construct(Article $article, Table $table, Form $form, Detail $detail)
	{
		$this->article = $article;
		$this->table   = $table;
		$this->form    = $form;
		$this->detail  = $detail;
	}

	/**
	 *
	 */
	public function show(): string
	{
		$parameter = null;
		$result    = $this->article->getAll($parameter);
		$this->table->render($result, self::CONFIG_TABLE);
	}

	/** @param $methodParam */
	public function search(string $methodParam): void
	{
		$result = $this->article->getSearchValue($methodParam);
		$this->table->render($result, self::CONFIG_TABLE, $methodParam);
	}

	/**
	 *
	 */
	public function newArticleForm(): void
	{
		$columns        = $this->article->getColumns();
		$flippedColumns = array_flip($columns);

		$optionDataSupplier = $this->optionDataToArray($this->article->getSupplier());
		$optionData         = $this->optionDataToArray($this->article->getProductgroup());

		$flippedColumns['hersteller']  = $optionDataSupplier;
		$flippedColumns['warengruppe'] = $optionData;
		$this->form->render($flippedColumns, self::CONFIG_NEW);
	}

	/** @param array $methodParameter */
	public function save(array $methodParameter): void
	{
		$this->article->new($methodParameter);
		header('Location: /article/show');
	}

	/** @param int $articleId */
	public function delete(int $articleId): void
	{
		$this->article->delete($articleId);
		header('Location: /article/show');
	}

	/** @param int $articleId */
	public function edit(int $articleId): void
	{
		$data                             = $this->article->getOne($articleId);
		$selectKeySupplier                = $data['hersteller'];
		$selectKeyProductgoup             = $data['warengruppe'];
		$optionDataSupplier               = $this->optionDataToArray($this->article->getSupplier());
		$optionData                       = $this->optionDataToArray($this->article->getProductgroup());
		$data['hersteller']               = $optionDataSupplier;
		$data['hersteller']['selectKey']  = (int)$selectKeySupplier;
		$data['warengruppe']              = $optionData;
		$data['warengruppe']['selectKey'] = (int)$selectKeyProductgoup;
		$this->form->render($data, self::CONFIG_EDIT);
	}

	/**
	 *
	 */
	public function update(): void
	{
		$this->article->update($_POST);//Hier muss noch auf POST abgefragt werden!
		echo 'Update war erfolgreich';
		//TODO: Wenn das Update erfolgreich war muss die FlashMessage Klasse aufgerufen werden.
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
			[$key, $val] = $masterData;
			$optionData[$key] = $val;
		}

		return $optionData;
	}

	/** @param int $articleId */
	public function detailView(int $articleId)
	{
		$detailData = $this->article->getDetail($articleId);
		$this->detail->render($detailData);
	}
}
