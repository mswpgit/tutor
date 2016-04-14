<?php

namespace MBase\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use MBase\Mapper\MenuMapper;

class MenuService extends AbstractService
{
	/**
	 * @var  MenuMapper
	 */
	protected $mapper;


	public function getByAlias($alias)
	{
		return $this->getMapper()->findOneBy(array('alias' => $alias));
	}

	public function getMenuByPath($path)
	{
		return $this->getMapper()->getMenuByPath($path);
	}

	public function getMenuIsDefault()
	{
		return $this->getMapper()->getMenuIsDefault();
	}

	public function getByMenuType($menuType)
	{
		return $this->getMapper()->findOneBy(array('menuType' => $menuType));
	}

	public function getMenuType($menuType)
	{
		return $this->getMapper()->getMenuType($menuType);
	}

	public function getRecursiveIterator()
	{
		$root_menu          = $this->getMapper()->getRootMenu();
		$collection         = new \Doctrine\Common\Collections\ArrayCollection($root_menu);
		$iterator           = new \MBase\Entity\RecursiveMenuIterator($collection);
		$recursive_iterator = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::SELF_FIRST);

		return $recursive_iterator;
	}

}
