<?php

namespace Mod\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mod\View;

class MenuWidget implements FactoryInterface
{

	/**
	 * Create service
	 *
	 * @param ServiceLocatorInterface $serviceManager
	 * @return mixed
	 */
	public function createService(ServiceLocatorInterface $serviceManager)
	{
		$locator = $serviceManager->getServiceLocator();
		$viewHelper = new View\Helper\MenuWidget;
		$viewHelper->setViewTemplate($locator->get('module_options')->getMenuWidgetViewTemplate());
		$viewHelper->setMenuForm($locator->get('menu_form'));
		return $viewHelper;
	}
}
