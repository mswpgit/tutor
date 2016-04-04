<?php
namespace EntityMod;

return array(
	'router' => array(
		'routes' => array(
			'entitest' => array(
				'type' => 'segment',
				'options' => array(
					'route' => '/entitest[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'EntityMod\Controller\Index',
						'action' => 'index',
					),
				),
			),
		),
	),
	'controllers' => array(
		'invokables' => array(
			'EntityMod\Controller\Index' => 'EntityMod\Controller\IndexController',
		),
	),
	'view_manager' => array(
		'template_path_stack' => array(
//			'blog' => __DIR__ . '/../view',
			__DIR__ . '/../view',
		),
	),
//	'doctrine' => array(
//		'driver' => array(
//			'EntityMod_Entities' => array(
//				'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
//				'cache' => 'array',
//				'paths' => array(__DIR__ . '/../src/EntityMod/Entity')
//			),
//			'orm_default' => array(
//				'drivers' => array(
//					'EntityMod\Entity' => 'EntityMod_Entities'
//				),
//			),
//		),
//	)
);