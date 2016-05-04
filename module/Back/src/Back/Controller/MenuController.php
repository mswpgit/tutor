<?php

namespace Back\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MenuController extends AbstractActionController
{
	public function indexAction()
	{
		/** @var $menuService \Content\Service\MenuService */
		$menuService = $this->getServiceLocator()->get('menuService');

		/** @var $materialService \Content\Service\MaterialService */
		$materialService = $this->getServiceLocator()->get('materialService');

		if ($materialService->getMaterialAll())
		{
			/** @var $material \Content\Entity\Material */
			foreach ($materialService->getMaterialAll() as $material)
			{
				\Zend\Debug\Debug::dump($material->getTitle());
				/** @var $category \Content\Entity\Category */
				$category = $material->getCategory();
				\Zend\Debug\Debug::dump($category->getTitle());
			}
		}


		/** @var $menu \Content\Entity\Menu */
		$allMenu = $menuService->getMenuAll();

		$menuList = array();
		if ($allMenu)
		{
			foreach ($allMenu as $menu)
			{
				$menuList[] = array(
					'id' => $menu->getId(),
					'title' => $menu->getTitle(),
					'type' => $menu->getType(),
					'order' => '1',
				);
			}
		}

		return new ViewModel(
			array(
				'menuList' => $menuList,
			)
		);
	}

}
