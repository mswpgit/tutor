<?php

namespace MBase\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use MBase\View;

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
		$viewHelper->setViewTemplate($locator->get('baseModuleOptions')->getMenuWidgetViewTemplate());
		$viewHelper->setServiceLocator($locator);
		return $viewHelper;
	}
}
