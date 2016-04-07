<?php

namespace Mod\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mod\View;

class LoginWidget implements FactoryInterface
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
		$viewHelper = new View\Helper\LoginWidget;
		$viewHelper->setViewTemplate($locator->get('module_options')->getLoginWidgetViewTemplate());
		$viewHelper->setServiceLocator($locator);
		$viewHelper->setLoginForm($locator->get('login_form'));
		return $viewHelper;
	}
}
