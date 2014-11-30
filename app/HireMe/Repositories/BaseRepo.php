<?php namespace HireMe\Repositories;

abstract class BaseRepo {

	protected $model;

	public function __construct()
	{
		$this->model = $this->getModel();
	}

	abstract function getModel();

	public function find($id)
	{
		return $this->model->find($id);
	}

}