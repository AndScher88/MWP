<?php

namespace MWP\Controller;

use MWP\Model\Entity\Productgroup;
use MWP\Model\Form;
use MWP\Model\Table;

class ProductgroupController
{
	/** @var array */
	private const CONFIG_EDIT = [
		'title' => 'Warengruppe bearbeiten',
		'headline' => 'Bitte irgendwas ändern:',
		'action' => '/productgroup/update',
		'type' => '',
		'selectOption' => []
	];

	/** @var array */
	private const CONFIG_NEW = [
		'title' => 'Warengruppe anlegen',
		'headline' => 'Bitte geben sie den Namen der Warengruppe ein:',
		'action' => '/productgroup/new',
		'type' => 'new',
		'selectOption' => []
	];

	private const CONFIG_TABLE = [
		'title' => 'Übersicht Warengruppen',
		'actionSearch' => '/productgroup/search/',
		'editLink' => '/productgroup/edit/',
		'deleteLink' => '/productgroup/delete/'
	];

	/** @var Table */
	private Table $table;
	/** @var Form */
	private Form $form;
	/** @var Productgroup */
	private Productgroup $productgroup;

	public function __construct()
	{
		$this->table = new Table();
		$this->form = new Form();
		$this->productgroup = new Productgroup();
	}

	public function new()
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$columns = $this->productgroup->getColumns();
		$columns = array_flip($columns);
		$this->form->render($columns, self::CONFIG_NEW);
		$groupname = $_POST;
		$this->productgroup->new($groupname);
	}

	public function edit()
	{
		require_once 'View/Templates/navbar.php';
		require_once 'View/Templates/template.php';
		$id = $_GET['id'];
		$data = $this->productgroup->getOne($id);
		$this->form->render($data, self::CONFIG_EDIT);
	}

	public function update()
	{
		$data = $_POST;
		$this->productgroup->update($data);
		header('Location: /productgroup/show');
	}

	public function delete()
	{
		$id = $_GET['id'];
		$this->productgroup->delete($id);
		header('Location: /productgroup/show');
	}

	public function show()
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$result = $this->productgroup->getAll();
		$this->table->render($result, self::CONFIG_TABLE);
	}

	public function search($methodParam)
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$result = $this->productgroup->getSearchValue($methodParam);
		$this->table->render($result, self::CONFIG_TABLE, $methodParam);
	}
}