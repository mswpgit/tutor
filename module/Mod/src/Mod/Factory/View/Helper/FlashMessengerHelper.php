<?php

namespace Mod\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Mod\View;

class FlashMessengerHelper implements FactoryInterface
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
		$viewHelper = new View\Helper\FlashMessengerHelper;
		$viewHelper->setServiceLocator($locator);
		return $viewHelper;
	}
}
