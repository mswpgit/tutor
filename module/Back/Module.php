<?php

namespace Back;

class Module
{
    public function getConfig()
    {
        $moduleConfig = include __DIR__ . '/config/module.config.php';
        return array_merge(
	        $moduleConfig
        );
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
