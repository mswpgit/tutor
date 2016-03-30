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
			'menu' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route'    => '/menu',
					'defaults' => array(
						'controller' => 'ModForm\Controller\Menu',
						'action'     => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'default' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '[/:action[/:id]]',
							'constraints' => array(
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
								'id'         => '\d+'
							),
							'defaults' => array(
							),
						),
					),
				),
			),
			'category' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route'    => '/category',
					'defaults' => array(
						'controller' => 'ModForm\Controller\Category',
						'action'     => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'default' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '[/:action[/:id]]',
							'constraints' => array(
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
								'id'         => '\d+'
							),
							'defaults' => array(
							),
						),
					),
				),

			),
		),
	),
	'controllers' => array(
		'invokables' => array(
			'ModForm\Controller\Test' => 'ModForm\Controller\TestController',
			'ModForm\Controller\Menu' => 'ModForm\Controller\MenuController',
			'ModForm\Controller\Category' => 'ModForm\Controller\CategoryController',
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