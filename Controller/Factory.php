<?php

namespace MWP\Controller;

use MWP\Model\Account;
use MWP\Model\Detail;
use MWP\Model\Entity\Article;
use MWP\Model\Entity\Dataportal;
use MWP\Model\Entity\Productgroup;
use MWP\Model\Entity\Supplier;
use MWP\Model\Form;
use MWP\Model\Table;
use MWP\Model\WeatherView;
use MWP\Src\DatabaseClass;

/**
 * Class Factory
 * @package MWP\Controller
 */
class Factory
{
	/** @return DatabaseClass */
	public function createDatabaseClass(): DatabaseClass
	{
		return new DatabaseClass();
	}

	/** @return ArticleController */
	public function createArticleController(): ArticleController
	{
		return new ArticleController(
			new Article($this->createDatabaseClass()),
			new Table(),
			new Form(),
			new Detail()
		);
	}

	/** @return ProductgroupController */
	public function createProductgroupController(): ProductgroupController
	{
		return new ProductgroupController(
			new Productgroup($this->createDatabaseClass()),
			new Table(),
			new Form()
		);
	}

	/** @return SupplierController */
	public function createSupplierController(): SupplierController
	{
		return new SupplierController(
			new Supplier($this->createDatabaseClass()),
			new Table(),
			new Form()
		);
	}

	/** @return DataportalController */
	public function createDataportalController(): DataportalController
	{
		return new DataportalController(
			new Dataportal($this->createDatabaseClass()),
//			new Table()
			new WeatherView()
		);
	}

	public function createLoginController(): AccountController
	{
		return new AccountController(
			new Account($this->createDatabaseClass())
		);
	}
}
