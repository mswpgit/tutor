<?php
namespace Mod\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$menuService = $this->getServiceLocator()->get('menuService');
		$menuMapper = $menuService->getMapper();

		/** @var $authService \Zend\Authentication\AuthenticationService */
		$authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

		if ($authService->hasIdentity())
		{
			$menu = new \Mod\Entity\Menu();
			$item = rand(2, 72);
			$menu->setMenuType('menu_' . $item);
			$menu->setTitle('Mеню' . $item);
			$menu->setDescription('Описание меню ' . $item);
			$menu->setIsActive(true);

			$menuMapper->save($menu);
		}

		\Zend\Debug\Debug::dump($menuMapper->getAll());

		return array();
	}

}