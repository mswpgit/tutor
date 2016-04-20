<?php

namespace MBase\Factory\Listener\Theme;

use MBase\Listener\Theme\FrontendListener,
	//
	Zend\ServiceManager\ServiceLocatorInterface,
	Zend\ServiceManager\FactoryInterface;

/**
 * @author Dolphin <work.dolphin@gmail.com>
 */
class FrontendFactory implements FactoryInterface
{
	/**
	 * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
	 * @return \MBase\Listener\Theme\FrontendListener
	 */
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$moduleOptions = $serviceLocator->get('themeModule');
		$listener = new FrontendListener();
		$listener->setModuleOptions($moduleOptions);
		return $listener;
	}
}
