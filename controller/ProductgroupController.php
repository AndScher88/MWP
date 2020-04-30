<?php

require_once 'model/Entity/Productgroup.php';
require_once 'model/Form.php';

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
	}

	public function edit()
	{
		#Hier müssen Warengruppen bearbeitet werden
	}

	public function delete()
	{
		#Hier müssen Warengruppen gelöscht werden

	}

	public function show()
	{
		#Hier sollen die Warengruppen angezeigt werden
		$productgroup = new Productgroup();
		$test = $productgroup->getAll();
		var_dump($test);
		die();
	}
}