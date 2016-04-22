<?php

namespace MApp\Factory\Listener\Theme;

use MApp\Listener\Theme\ThemeStrategy;
	//
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class ThemeStrategyFactory implements FactoryInterface
{
	/**
	 * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
	 * @return \MApp\Listener\Theme\ThemeStrategy
	 */
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$controllerManager = $serviceLocator->get('ControllerLoader');
		$moduleOptions = $serviceLocator->get('appThemeModule');
		$viewManager = $serviceLocator->get('viewManager');
		$listener = new ThemeStrategy();
		$listener->setControllerManager($controllerManager);
		$listener->setViewManager($viewManager);
		$listener->setThemeOptions($moduleOptions);
		return $listener;
	}
}
