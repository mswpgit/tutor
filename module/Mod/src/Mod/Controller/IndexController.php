<?php
namespace Mod\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$menuService = $this->getServiceLocator()->get('menuService');
		$menuMapper = $menuService->getMapper();

		$menu = new \Mod\Entity\Menu();
		$menu->setMenuType('main');
		$menu->setTitle('Главное меню');
		$menu->setDescription('Описание главного меню');
		$menu->setIsActive(true);

		$menuMapper->save($menu);

		\Zend\Debug\Debug::dump($menuMapper->getAll());

		return array();
	}

}