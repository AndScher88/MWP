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
		'action' => '/Productgroup/update',
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
		'title' => 'Übersicht Warengruppen',
		'actionSearch' => '/Productgroup/search/',
		'editLink' => '/Productgroup/edit/',
		'deleteLink' => '/Productgroup/delete/'
	];

	public function __construct()
	{
	}

	public function new()
	{
		#Hier müssen neue Warengruppen erstellt werden können
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';

		$productgroup = new Productgroup();
		$columns = $productgroup->getColumns();
		$columns = array_flip($columns);
		$form = new Form($columns, self::CONFIG_NEW);
		$form->render();
		$groupname = $_POST;
		$productgroup->new($groupname);
		//header('Location: /Productgroup/show');
	}

	public function edit()
	{
		#Hier müssen Warengruppen bearbeitet werden
		$id = $_GET['id'];
		$productgroup = new Productgroup();
		$data = $productgroup->getOne($id);
		$form = new Form($data, self::CONFIG_EDIT);
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$form->render();
	}

	public function update()
	{
		$data = $_POST;
		$productgroup = new Productgroup();
		$productgroup->update($data);
		header('Location: /Productgroup/show');
	}

	public function delete()
	{
		#Hier müssen Warengruppen gelöscht werden
		$id = $_GET['id'];
		$productgroup = new Productgroup();
		$productgroup->delete($id);
		header('Location: /Productgroup/show');
	}

	public function show()
	{
		#Hier sollen die Warengruppen angezeigt werden
		$productgroup = new Productgroup();
		$result = $productgroup->getAll();
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$table = new Table($result,self::CONFIG_TABLE);
		$table->render();
	}

	public function search($methodParam)
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$data = new Productgroup();
		$result = $data->getSearchValue($methodParam);
		$table = new Table($result,self::CONFIG_TABLE, $methodParam);
		$table->render();
	}
}