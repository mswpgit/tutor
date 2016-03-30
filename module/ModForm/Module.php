<?php
namespace ModForm;

use ModForm\Service\CategoryService;

class Module
{
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
				'ModForm\Service\CategoryService' => function($em){
					return new CategoryService($em->get('Doctrine\ORM\EntityManager'));
				}
			)
		);
	}
}