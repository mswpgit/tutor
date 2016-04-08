<?php

namespace Mod\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mod\View;

class LeftMenu implements FactoryInterface
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
		$viewHelper = new View\Helper\LeftMenu($locator->get('module_options'));
		$my_settings = $locator->get('my-settings');
		if (!empty($my_settings['menu']['left']))
		{
			$viewHelper->setLink($my_settings['menu']['left']);
		}

		return $viewHelper;
	}
}
