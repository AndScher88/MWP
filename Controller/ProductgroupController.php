<?php

namespace MWP\Controller;

use MWP\Model\Entity\Productgroup;
use MWP\Model\Form;
use MWP\Model\Table;

/**
 * Class ProductgroupController
 * @package MWP\Controller
 */
class ProductgroupController
{
	/** @var array */
	private const CONFIG_EDIT = [
		'title' => 'Warengruppe bearbeiten',
		'headline' => 'Bitte irgendwas ändern:',
		'action' => '/productgroup/update',
		'actionName' => 'Speichern',
		'type' => '',
		'selectOption' => []
	];

	/** @var array */
	private const CONFIG_NEW = [
		'title' => 'Warengruppe anlegen',
		'headline' => 'Bitte geben sie den Namen der Warengruppe ein:',
		'action' => '/productgroup/save',
		'actionName' => 'Speichern',
		'type' => 'new',
		'selectOption' => []
	];

	/** @var array*/
	private const CONFIG_TABLE = [
		'title' => 'Übersicht Warengruppen',
		'actionSearch' => '/productgroup/search/',
		'editLink' => '/productgroup/edit/',
		'deleteLink' => '/productgroup/delete/',
		'detailLink' => '/productgroup/detail'
	];

	/** @var Table */
	private Table $table;
	/** @var Form */
	private Form $form;
	/** @var Productgroup */
	private Productgroup $productgroup;

	/** ProductgroupController constructor.
	 * @param Productgroup $productgroup
	 * @param Table $table
	 * @param Form $form
	 */
	public function __construct(Productgroup $productgroup, Table $table, Form $form)
	{
		$this->table = $table;
		$this->form = $form;
		$this->productgroup = $productgroup;
	}

	/**
	 *
	 */
	public function newProductgroupForm(): void
	{
		$columns = $this->productgroup->getColumns();
		$columns = array_flip($columns);
		$this->form->render($columns, self::CONFIG_NEW);
	}

	/** @param array $methodParameter */
	public function save(array $methodParameter): void
	{
		$this->productgroup->new($methodParameter);
		header('Location: /productgroup/show');
	}

	/** @param int $methodParameter */
	public function edit(int $methodParameter): void
	{
		$data = $this->productgroup->getOne($methodParameter);
		$this->form->render($data, self::CONFIG_EDIT);
	}

	/** @param array $methodParameter */
	public function update(array $methodParameter): void
	{
		$this->productgroup->update($methodParameter);
		header('Location: /productgroup/show');
	}

	/** @param int $methodParameter */
	public function delete(int $methodParameter): void
	{
		$this->productgroup->delete($methodParameter);
		header('Location: /productgroup/show');
	}

	/**
	 *
	 */
	public function show(): void
	{
		$result = $this->productgroup->getAll();
		$this->table->render($result, self::CONFIG_TABLE);
	}

	/** @param string $methodParam */
	public function search(string $methodParam): void
	{
		$result = $this->productgroup->getSearchValue($methodParam);
		$this->table->render($result, self::CONFIG_TABLE, $methodParam);
	}
}