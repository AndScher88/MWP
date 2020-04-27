<?php

require_once 'model/Entity/Article.php';
require_once 'model/Table.php';
require_once 'model/Form.php';


class ArticleController
{
	public function __construct()
	{
	}

	public function showAll()
	{
		require_once 'view/article/showArticle.php';
		$data = new Article();
		$result = $data->getAll();
		$table = new Table($result);
		$table->render();
	}

	public function search($methodParam)
	{
		include 'view/article/showArticle.php';
		echo '<p class="container">Hier sind die Ergebnisse zu: '  . $methodParam.  ' !</p>';
		echo '<br>';

		$data = new Article();
		$result = $data->getSearchValue($methodParam);
		$table = new Table($result);
		$table->render();
	}

	public function newArticle()
	{
		#Abfrage der entsprechenden Tabelle nach den Spaltennamen
		#Form bauen
		include 'view/article/newArticle.php';
		$test = $_POST;
		$data = new Article();
		$data->createArticle($test);
		#Artikeldaten in der Tabelle speichern
	}

	public function delete()
	{
		// Hier wird irgendwas gelöscht
		$id = $_GET['id'];
		$article = new Article();
		$article->delete($id);
		header('Location: /article/showAll');
	}

	public function edit()
	{
		$id = $_GET['id'];
		$article = new Article();
		$data = $article->getOne($id);
		$groupData = $article->getProductgroup();
		$form = new Form($data, $groupData, $parameter = 'Artikel bearbeiten');
		require_once 'view/templates/template.php';
		require_once 'view/templates/navbar.php';
		$form->render();
	}

	public function update()
	{
		$data = $_POST;
		$article = new Article();
		$article->update($data);
		echo 'Update war erfolgreich';
		header('Location: /article/showAll');
	}

}