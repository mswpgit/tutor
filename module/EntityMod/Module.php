<?php
namespace EntityMod;

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
				'catMapper'  => function($serviceManager) {
					$options = array(
						'catEntityClass' => 'EntityMod\Entity\Cat',
					);
					return new \EntityMod\Mapper\CatMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$options
					);
				},
				'catService' => function ($serviceManager) {
					return new \EntityMod\Service\CatService(
						$serviceManager->get('catMapper')
					);
				},
			),
		);
	}

}
