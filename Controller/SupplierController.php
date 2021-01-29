<?php

namespace MWP\Controller;

use MWP\Model\Entity\Supplier;
use MWP\Model\Form;
use MWP\Model\Table;

/**
 * Class SupplierController
 * @package MWP\Controller
 */
class SupplierController
{
	/** @var array*/
	private const CONFIG_NEW = [
		'title' => 'Lieferanten anlegen',
		'headline' => 'Bitte hier die Daten des Lieferanten eintragen: ',
		'action' => '/supplier/save',
		'actionName' => 'Speichern',
		'type' => 'new',
		'selectOption' => ['lieferant']
	];

	/** @var array*/
	private const CONFIG_EDIT = [
		'title' => 'Lieferanten bearbeiten',
		'headline' => 'Bitte hier die neuen Daten des Lieferanten eingeben:',
		'action' => '/supplier/update',
		'actionName' => 'Speichern',
		'type' => '',
		'selectOption' => ['lieferant']
	];

	/** @var array*/
	private const  CONFIG_TABLE = [
		'title' => 'Lieferanten übersicht',
		'actionSearch' => '/supplier/search/',
		'editLink' => '/supplier/edit/',
		'deleteLink' => '/supplier/delete/',
		'detailLink' => '/supplier/detail'
	];

	/** @var Table */
	private Table $table;
	/** @var Form */
	private Form $form;
	/** @var Supplier */
	private Supplier $supplier;

	/**
	 * SupplierController constructor.
	 * @param Supplier $supplier
	 * @param Table $table
	 * @param Form $form
	 */
	public function __construct(Supplier $supplier, Table $table, Form $form)
	{
		$this->table = $table;
		$this->form = $form;
		$this->supplier = $supplier;
	}

	public function newSupplierForm(): void
	{
		$columns = $this->supplier->getColumns();
		$flippedColumns = array_flip($columns);
		$this->form->render($flippedColumns, self::CONFIG_NEW);
	}

	/** @param array $methodParameter */
	public function save(array $methodParameter): void
	{
		$this->supplier->new($methodParameter);
		header('Location: /supplier/show');
	}

	public function show(): void
	{
		$result = $this->supplier->getAll();
		$this->table->render($result, self::CONFIG_TABLE);
	}

	/** @param $methodParam */
	public function search($methodParam): void
	{
		$result = $this->supplier->getSearchValue($methodParam);
		$this->table->render($result, self::CONFIG_TABLE, $methodParam);
	}

	/** @param int $methodParameter */
	public function edit(int $methodParameter): void
	{
		$data = $this->supplier->getOne($methodParameter);
		$this->form->render($data, self::CONFIG_EDIT);
	}

	/** @param array $methodParameter */
	public function update(array $methodParameter): void
	{
		$this->supplier->update($methodParameter);
		header('Location: /supplier/show');
	}

	/** @param int $methodParameter */
	public function delete(int $methodParameter)
	{
		$this->supplier->delete($methodParameter);
		header('Location: /supplier/show');
	}
}
