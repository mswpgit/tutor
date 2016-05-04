<?php

namespace Content\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use Content\Mapper\MaterialMapper;
use Base\Service\AbstractService;

class MaterialService extends AbstractService
{
	/**
	 * @var  MaterialMapper
	 */
	protected $mapper;

	public function getMaterialAll()
	{
		return $this->getMapper()->getAll();
	}

}
