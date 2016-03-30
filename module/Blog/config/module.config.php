<?php
namespace Blog;

return array(
	'router' => array(
		'routes' => array(
			'post' => array(
				'type' => 'segment',
				'options' => array(
					'route' => '/post[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Blog\Controller\Post',
						'action' => 'index',
					),
				),
			),
		),
	),
	'controllers' => array(
		'invokables' => array(
			'Blog\Controller\Post' => 'Blog\Controller\PostController'
		),
	),
	'view_manager' => array(
		'template_path_stack' => array(
			'blog' => __DIR__ . '/../view',
		),
	),
	'doctrine' => array(
		'driver' => array(
			'Blog_Entities' => array(
				'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => array(__DIR__ . '/../src/Blog/Entity')
			),
			'orm_default' => array(
				'drivers' => array(
					'Blog\Entity' => 'Blog_Entities'
				),
			),
		),
	)
);