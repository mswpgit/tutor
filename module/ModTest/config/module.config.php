<?php
namespace ModForm;

return array(
	'router' => array(
		'routes' => array(
			'mtest' => array(
				'type' => 'segment',
				'options' => array(
					'route' => '/mtest[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'ModTest\Controller\Test',
						'action' => 'index',
					),
				),
			),
		),
	),
	'controllers' => array(
		'invokables' => array(
			'ModTest\Controller\Test' => 'ModTest\Controller\TestController',
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
//			'ModTest_Entities' => array(
//				'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
//				'cache' => 'array',
//				'paths' => array(__DIR__ . '/../src/ModTest/Entity')
//			),
//			'orm_default' => array(
//				'drivers' => array(
//					'ModTest\Entity' => 'ModTest_Entities'
//				),
//			),
//		),
//	)
);