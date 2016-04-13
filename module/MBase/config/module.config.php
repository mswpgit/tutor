<?php

namespace MBase;

return array(
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