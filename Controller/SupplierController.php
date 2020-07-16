<?php


namespace MWP\Controller;


use MWP\Model\Entity\Article;
use MWP\Model\Entity\Supplier;
use MWP\Model\Form;
use MWP\Model\Table;

class SupplierController
{
	private const CONFIG_NEW = [
		'title' => 'Lieferanten anlegen',
		'headline' => 'Bitte hier die Daten des Lieferanten eintragen: ',
		'action' => '/supplier/new',
		'type' => 'new',
		'selectOption' => ['lieferant']
	];

	private const CONFIG_EDIT = [
		'title' => 'Lieferanten bearbeiten',
		'headline' => 'Bitte hier die neuen Daten des Lieferanten eingeben:',
		'action' => '/supplier/update',
		'type' => '',
		'selectOption' => ['lieferant']
	];

	private const  CONFIG_TABLE = [
		'title' => 'Lieferanten übersicht',
		'actionSearch' => '/supplier/search/',
		'editLink' => '/supplier/edit/',
		'deleteLink' => '/supplier/delete/'
	];

	public function __construct()
	{
		$this->article = new Article();
		$this->table = new Table();
		$this->form = new  Form();
		$this->supplier = new Supplier();
	}

	public function new()
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$columns = $this->supplier->getColumns();
		$flippedColumns = array_flip($columns);
		$this->form->render($flippedColumns, self::CONFIG_NEW);
		$masterData = $_POST;
		$this->supplier->new($masterData);
	}

	public function show()
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$result = $this->supplier->getAll();
		if ($result === null) {
			exit('<br><p style="color: red">Es liegen keine Daten vor!</p>');
		}
		$this->table->render($result, self::CONFIG_TABLE);
	}

	public function search($methodParam)
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$result = $this->supplier->getSearchValue($methodParam);
		$this->table->render($result, self::CONFIG_TABLE,$methodParam);
	}

	public function edit()
	{
		require_once 'View/Templates/template.php';
		require_once 'View/Templates/navbar.php';
		$id = $_GET['id'];
		$data = $this->supplier->getOne($id);
		$this->form->render($data, self::CONFIG_EDIT);
	}

	public function update()
	{
		$data = $_POST;
		$this->supplier->update($data);
		echo 'Update war erfolgreich';
		header('Location: /supplier/show');
	}

	public function delete()
	{
		$id = $_GET['id'];
		$this->supplier->delete($id);
		header('Location: /supplier/show');
	}
}