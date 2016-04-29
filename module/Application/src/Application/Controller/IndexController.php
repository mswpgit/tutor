<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
	public function testAction()
    {
        return new ViewModel();
    }
	public function formAction()
    {
        return new ViewModel();
    }

	public function formMenuTypeAction()
    {
	    if ($this->getRequest()->isPost())
	    {
		    \Zend\Debug\Debug::dump($this->getRequest()->getPost());
	    }

        return new ViewModel();
    }

	public function formMenuAction()
	{
		if ($this->getRequest()->isPost())
		{
			\Zend\Debug\Debug::dump($this->getRequest()->getPost());
		}

		return new ViewModel();
	}

	public function viewMenuAction()
	{
		/** @var $menuService \Content\Service\MenuService */
		$menuService = $this->getServiceLocator()->get('menuService');

		/** @var $menu \Content\Entity\Menu */
		$menu = $menuService->getMenuType(1);


		$menuList = array(
			1 => array(
				'id' => '1',
				'title' => 'Россия',
				'type' => 'material',
				'order' => '1',
			),
			2 => array(
				'id' => '2',
				'title' => 'Страны',
				'type' => 'category',
				'order' => '1',
			),

		);

		if ($menu)
		{
			$menuList[] = array(
					'id' => $menu->getId(),
					'title' => $menu->getTitle(),
					'type' => $menu->getType(),
					'order' => '1',
				);
		}

		return new ViewModel(
			array(
			'menuList' => $menuList,
			)
		);
	}

	public function viewMenuTypeAction()
	{
		$menuTypes = array(
			1 => array(
				'id' => '1',
				'title' => 'Главное меню',
				'type' => 'main_menu',
			),
			2 => array(
				'id' => '2',
				'title' => 'Подменю',
				'type' => 'sub_menu',
			),
			3 => array(
				'id' => '3',
				'title' => 'Меню стран',
				'type' => 'country_menu',
			),

		);

//		$menuTypes = array();
		return new ViewModel(
			array(
				'menuTypes' => $menuTypes,
			)
		);
	}

	public function formMaterialAction()
	{
		if ($this->getRequest()->isPost())
		{
			\Zend\Debug\Debug::dump($this->getRequest()->getPost());
		}

		return new ViewModel();
	}

	public function viewMaterialAction()
	{
		$materialList = array(
			1 => array(
				'id' => '1',
				'title' => 'Россия',
				'type' => 'material',
				'order' => '1',
				'category' => 'cat_1',
				'date' => '2016-04-28',
			),
			2 => array(
				'id' => '2',
				'title' => 'Страны',
				'type' => 'category',
				'order' => '1',
				'category' => 'cat_2',
				'date' => '2016-04-29',
			),

		);

		return new ViewModel(
			array(
				'materialList' => $materialList,
			)
		);
	}

	public function formCategoryAction()
	{
		if ($this->getRequest()->isPost())
		{
			\Zend\Debug\Debug::dump($this->getRequest()->getPost());
		}

		return new ViewModel();
	}

	public function viewCategoryAction()
	{
		return new ViewModel();
	}


}
