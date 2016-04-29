<?php

namespace Content\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use Content\Mapper\MenuMapper;
use Base\Service\AbstractService;

class MenuService extends AbstractService
{
	/**
	 * @var  MenuMapper
	 */
	protected $mapper;

	public function getMenuType($id)
	{
		return $this->getMapper()->getItemById($id);
	}

	public function getRecursiveIterator()
	{
		$root_menu          = $this->getMapper()->getRootMenu();
		$collection         = new \Doctrine\Common\Collections\ArrayCollection($root_menu);
		$iterator           = new \Content\Entity\RecursiveMenuIterator($collection);
		$recursive_iterator = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::SELF_FIRST);
		return $recursive_iterator;
	}

}
