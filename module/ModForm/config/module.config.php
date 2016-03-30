<?php
namespace ModForm;

return array(
	'router' => array(
		'routes' => array(
			'test' => array(
				'type' => 'segment',
				'options' => array(
					'route' => '/test[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'ModForm\Controller\Test',
						'action' => 'index',
					),
				),
			),
		),
	),
	'controllers' => array(
		'invokables' => array(
			'ModForm\Controller\Test' => 'ModForm\Controller\TestController'
		),
	),
	'view_manager' => array(
		'template_path_stack' => array(
//			'blog' => __DIR__ . '/../view',
			__DIR__ . '/../view',
		),
	),
	'doctrine' => array(
		'driver' => array(
			'ModForm_Entities' => array(
				'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => array(__DIR__ . '/../src/ModForm/Entity')
			),
			'orm_default' => array(
				'drivers' => array(
					'ModForm\Entity' => 'ModForm_Entities'
				),
			),
		),
	)
);