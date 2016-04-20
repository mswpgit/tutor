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

	    $sharedEvents->attach('*', 'dispatch', function($e) use($sm) {
				    $theme = $sm->get('listenerThemeFrontend');
				    $theme->update($e);
	    }, - PHP_INT_MAX);
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

}
