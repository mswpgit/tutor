<?php

namespace MBase\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use MBase\Mapper\ContentMapper;

class ContentService extends AbstractService
{
	/**
	 * @var  ContentMapper
	 */
	protected $mapper;

	public function getAllContentType()
	{
		return $this->getMapper()->getAll();
	}

	public function getById($id)
	{
		return $this->getMapper()->getById($id);
	}

}
