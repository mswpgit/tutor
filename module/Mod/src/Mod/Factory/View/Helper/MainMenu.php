<?php

namespace Mod\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mod\View;

class MainMenu implements FactoryInterface
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
		$viewHelper = new View\Helper\MainMenu($locator->get('module_options'));

		if ($locator->has('my-settings'))
		{
			$my_settings = $locator->get('my-settings');
			if (!empty($my_settings['menu']['main']))
			{
				$viewHelper->setLink($my_settings['menu']['main']);
			}
//			\Zend\Debug\Debug::dump($locator->get('my-settings'));

		}


		return $viewHelper;
	}
}
