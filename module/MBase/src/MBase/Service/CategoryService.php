<?php

namespace MBase\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use MBase\Mapper\CategoryMapper;

class CategoryService extends AbstractService
{
	/**
	 * @var  CategoryMapper
	 */
	protected $mapper;


	public function getByAlias($alias)
	{
		return $this->getMapper()->findOneBy(array('alias' => $alias));
	}

	public function getByMenuType($menuType)
	{
		return $this->getMapper()->findOneBy(array('menuType' => $menuType));
	}

	public function getRecursiveIterator()
	{
		$root_categories    = $this->getMapper()->getRootCategories();
		$collection         = new \Doctrine\Common\Collections\ArrayCollection($root_categories);
		$iterator           = new \MBase\Entity\RecursiveCategoryIterator($collection);
		$recursive_iterator = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::SELF_FIRST);

		return $recursive_iterator;
	}

}
