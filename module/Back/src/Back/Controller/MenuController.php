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

}
