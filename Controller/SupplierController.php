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
		'action' => '/supplier/edit',
		'type' => 'new',
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
}