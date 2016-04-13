<?php

namespace MBase\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use MBase\Mapper\MenuTypeMapper;

class MenuTypeService extends AbstractService
{
	/**
	 * @var  MenuTypeMapper
	 */
	protected $mapper;

	public function getAllMenuType()
	{
		return $this->getMapper()->getAll();
	}
}
