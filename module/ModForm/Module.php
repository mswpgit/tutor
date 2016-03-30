<?php
namespace ModForm;

use ModForm\Service\CategoryService;
use ModForm\Service\PageService;
use ModForm\Form\PageForm;

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
				},
				'ModForm\Service\PageService' => function($em){
					return new PageService($em->get('Doctrine\ORM\EntityManager'));
				},
				'ModForm\Form\PageForm' => function($em){
					return new PageForm($em->get('Doctrine\ORM\EntityManager'));
				},
			)
		);
	}
}