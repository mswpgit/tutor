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
				'form_hydrator'    => 'Zend\Stdlib\Hydrator\ClassMethods',
			),
			'factories' => array(
				'module_options' => function($serviceManager) {
					$config = $serviceManager->get('config');
					return new Options\ModuleOptions(
						isset($config['moduleOptions']) ? $config['moduleOptions'] : array()
					);
				},
				'menuMapper'  => function($serviceManager) {
					return new \Mod\Mapper\MenuMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('module_options')
					);
				},
				'menuService' => function ($serviceManager) {
					return new \Mod\Service\MenuService(
						$serviceManager->get('menuMapper')
					);
				},
				'moduleMapper'  => function($serviceManager) {
					return new \Mod\Mapper\ModuleMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('module_options')
					);
				},
				'moduleService' => function ($serviceManager) {
					return new \Mod\Service\ModuleService(
						$serviceManager->get('moduleMapper')
					);
				},
				'userMapper'  => function($serviceManager) {
					return new \Mod\Mapper\UserMapper(
						$serviceManager->get('doctrine.entitymanager.orm_default'),
						$serviceManager->get('module_options')
					);
				},
				'loginService' => function ($serviceManager) {
					return new \Mod\Service\LoginService(
						$serviceManager->get('userMapper')
					);
				},
				'menu_form' => 'Mod\Factory\Form\Menu',
				'login_form' => 'Mod\Factory\Form\Login',
			),
		);
	}

	public function getViewHelperConfig()
	{
		return array(
			'factories' => array(
				'menuWidget' => 'Mod\Factory\View\Helper\MenuWidget',
				'loginWidget' => 'Mod\Factory\View\Helper\LoginWidget',
				'messengerHelper' => 'Mod\Factory\View\Helper\FlashMessengerHelper',
			),
		);

	}

}
