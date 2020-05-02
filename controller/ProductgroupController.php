<?php

require_once 'model/Entity/Productgroup.php';
require_once 'model/Form.php';
require_once 'model/Table.php';

class ProductgroupController
{
	/** @var array */
	private const CONFIG_EDIT = [
		'title' => 'Warengruppe bearbeiten',
		'headline' => 'Bitte irgendwas ändern:',
		'action' => '/productgoup/update',
		'type' => '',
		'selectOption' => []
	];

	/** @var array */
	private const CONFIG_NEW = [
		'title' => 'Warengruppe anlegen',
		'headline' => 'Bitte geben sie den Namen der Warengruppe ein:',
		'action' => '/Productgroup/new',
		'type' => 'new',
		'selectOption' => []
	];

	private const CONFIG_TABLE = [
		'title' => 'Warengruppe übersicht',
		'actionSearch' => '/productgroup/search/',
		'editLink' => '/Productgroup/edit/',
		'deleteLink' => '/Productgroup/delete/'
	];

	public function __construct()
	{
	}

	public function new()
	{
		#Hier müssen neue Warengruppen erstellt werden können
		require_once 'view/templates/template.php';
		require_once 'view/templates/navbar.php';

		$productgroup = new Productgroup();
		$columns = $productgroup->getColumns();
		$columns = array_flip($columns);
		$form = new Form($columns, self::CONFIG_NEW);
		$form->render();
		$groupname = $_POST;
		$productgroup->new($groupname);
		//header('Location: /productgroup/show');
	}

	public function edit()
	{
		#Hier müssen Warengruppen bearbeitet werden
		$id = $_GET['id'];
		$productgroup = new Productgroup();
		$data = $productgroup->getOne($id);
		$form = new Form($data, self::CONFIG_EDIT);
		require_once 'view/templates/template.php';
		require_once 'view/templates/navbar.php';
		$form->render();
	}

	public function delete()
	{
		#Hier müssen Warengruppen gelöscht werden
		$id = $_GET['id'];
		$productgroup = new Productgroup();
		$productgroup->delete($id);
		header('Location: /productgroup/show');
	}

	public function show()
	{
		#Hier sollen die Warengruppen angezeigt werden
		$productgroup = new Productgroup();
		$result = $productgroup->getAll();
		require_once 'view/templates/template.php';
		require_once 'view/templates/navbar.php';
		$table = new Table($result,self::CONFIG_TABLE);
		$table->render();
	}
}