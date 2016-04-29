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
