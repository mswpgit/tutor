<?php
namespace Mod;

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

	/**
	 * Expected to return \Zend\ServiceManager\Config object or array to
	 * seed such an object.
	 *
	 * @return array|\Zend\ServiceManager\Config
	 */
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
				'ModuleOptions' => function($serviceManager) {
					$config = $serviceManager->get('config');
					return new Options\ModuleOptions(
						isset($config['moduleOptions']) ? $config['moduleOptions'] : array()
					);
				},
				'menuMapper'  => function($serviceManager) {
					return new \Mod\Mapper\MenuMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('ModuleOptions')
					);
				},
				'menuService' => function ($serviceManager) {
					return new \Mod\Service\MenuService(
						$serviceManager->get('menuMapper')
					);
				},
			),
		);
	}

}
