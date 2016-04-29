<?php

namespace Back;

return array(
	'router' => array(
		'routes' => array(
			'admin_menu' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/admin/menu',
					'defaults' => array(
						'__NAMESPACE__' => 'Back\Controller',
						'controller'    => 'Menu',
						'action'        => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'default' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '/admin/menu[/:controller[/:action]]',
							'constraints' => array(
								'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
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
			'Back\Controller\Menu' => 'Back\Controller\MenuController',
		),
	),
	'view_manager' => array(
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),

);
