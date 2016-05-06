<?php

namespace Content\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use Content\Mapper\CategoryMapper;
use Base\Service\AbstractService;

class CategoryService extends AbstractService
{
	/**
	 * @var  CategoryMapper
	 */
	protected $mapper;

	public function getCategoryAll()
	{
		return $this->getMapper()->getAll();
	}

	public function getCategoryById($id)
	{
		return $this->getMapper()->getById($id);
	}

}
