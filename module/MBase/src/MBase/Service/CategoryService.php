<?php

namespace MBase\Service;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator;
use MBase\Mapper\CategoryMapper;
use Zend\View\Model\ViewModel;

class CategoryService extends AbstractService
{
	/**
	 * @var  CategoryMapper
	 */
	protected $mapper;


	public function getCategoryByAlias($alias)
	{
		return $this->getMapper()->getCategoryByAlias($alias);
	}

	public function getByPath($path)
	{
		return $this->getMapper()->getByPath($path);
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

	public function viewRender($id)
	{
		if ($id)
		{
			$category = $this->getMapper()->getItemById($id);
			if ($category)
			{
				$vm = new ViewModel(array(
					'category' => $category
				));

				$vm->setTemplate('m-base/view_category');

				return $vm;
			}
		}

		return '';
	}

}
