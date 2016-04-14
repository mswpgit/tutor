<?php

namespace MBase;

return array(
	'view_manager' => array(
		'template_map' => array(
			'm-base/view_category' => __DIR__ . '/../view/m-base/templates/view_category.phtml',
			'm-base/view_content'  => __DIR__ . '/../view/m-base/templates/view_content.phtml',
			'm-base/menu'          => __DIR__ . '/../view/m-base/templates/menu.phtml',
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