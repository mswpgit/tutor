<?php

namespace MBase;

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
			'initializers' => array(
			),
			'aliases' => array(
				'doctrine' => 'doctrine.entitymanager.orm_default',
			),
			'invokables' => array(
			),
			'factories' => array(
				'baseModuleOptions' => function($serviceManager) {
					$config = $serviceManager->get('config');
					return new Options\ModuleOptions(
						isset($config['moduleOptions']) ? $config['moduleOptions'] : array()
					);
				},
				'menuMapper'  => function($serviceManager) {
					return new \MBase\Mapper\MenuMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('baseModuleOptions')
					);
				},
				'menuService' => function ($serviceManager) {
					return new \MBase\Service\MenuService(
						$serviceManager->get('menuMapper')
					);
				},
				'menuTypeMapper'  => function($serviceManager) {
					return new \MBase\Mapper\MenuTypeMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('baseModuleOptions')
					);
				},
				'menuTypeService' => function ($serviceManager) {
					return new \MBase\Service\MenuTypeService(
						$serviceManager->get('menuTypeMapper')
					);
				},
				'categoryMapper'  => function($serviceManager) {
					return new \MBase\Mapper\CategoryMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('baseModuleOptions')
					);
				},
				'categoryService' => function ($serviceManager) {
					return new \MBase\Service\CategoryService(
						$serviceManager->get('categoryMapper')
					);
				},
				'contentMapper'  => function($serviceManager) {
					return new \MBase\Mapper\ContentMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('baseModuleOptions')
					);
				},
				'contentService' => function ($serviceManager) {
					return new \MBase\Service\ContentService(
						$serviceManager->get('contentMapper')
					);
				},
			),
		);
	}
}
