<?php
namespace Mod;

return array(
	'router' => array(
		'routes' => array(
			'menu' => array(
				'type' => 'segment',
				'options' => array(
					'route' => '/menu[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Mod\Controller\Index',
						'action' => 'index',
					),
				),
			),
		),
	),
	'controllers' => array(
		'invokables' => array(
			'Mod\Controller\Index' => 'Mod\Controller\IndexController',
		),
	),
	'view_manager' => array(
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),

	'doctrine' => array(
		'driver' => array(
			__NAMESPACE__ . 'Entity' => array(
				'class' => 'Doctrine\ORM\Mapping\Driver\PHPDriver',
				'paths' => array(__DIR__ . '/doctrine'),
			),
			'orm_default' => array(
				'drivers' => array(
					__NAMESPACE__ . '\Entity' => __NAMESPACE__ . 'Entity',
				),
			),
		),
	),

);