<?php

namespace Content;

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
				'contentModuleOptions' => function($serviceManager) {
					$config = $serviceManager->get('config');
					return new Options\ModuleOptions(
						isset($config['contentModule']) ? $config['contentModule'] : array()
					);
				},
				'menuMapper'  => function($serviceManager) {
					return new \Content\Mapper\MenuMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('contentModuleOptions')
					);
				},
				'menuService' => function ($serviceManager) {
					return new \Content\Service\MenuService(
						$serviceManager->get('menuMapper')
					);
				},
				'materialMapper'  => function($serviceManager) {
					return new \Content\Mapper\MaterialMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('contentModuleOptions')
					);
				},
				'materialService' => function ($serviceManager) {
					return new \Content\Service\MaterialService(
						$serviceManager->get('materialMapper')
					);
				},
				'categoryMapper'  => function($serviceManager) {
					return new \Content\Mapper\CategoryMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('contentModuleOptions')
					);
				},
				'categoryService' => function ($serviceManager) {
					return new \Content\Service\CategoryService(
						$serviceManager->get('categoryMapper')
					);
				},
				'materialForm' => 'Content\Factory\Form\Material',

			),

		);
	}

}
