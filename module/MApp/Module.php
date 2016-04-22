<?php

namespace MApp;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
	    $app = $e->getApplication();
	    $sm = $app->getServiceManager();
	    $sharedEvents = $app->getEventManager()->getSharedManager();

	    $sharedEvents->attachAggregate(
		    new \MApp\Listener\Theme\ThemeContext()
	    );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

	public function getServiceConfig()
	{
		return array(
			'factories' => array(
				'appThemeModule' => function($serviceManager) {
					$config = $serviceManager->get('config');
					return new Options\ThemeOptions(
						isset($config['sc']) ? $config['sc'] : array()
					);
				},
				'themeStrategy' => 'MApp\Factory\Listener\Theme\ThemeStrategyFactory',
			),
		);
	}

}
