<?php

namespace MApp1;

return array(
    'router' => array(
        'routes' => array(
            'app1' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/app1',
                    'defaults' => array(
                        '__NAMESPACE__' => 'MApp1\Controller',
                        'controller'    => 'App',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
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
	        'category1' => array(
		        'type'    => 'Segment',
		        'options' => array(
			        'route'    => '/category1[/:allias]',
			        'constraints' => array(
				        'allias' => '[a-zA-Z][a-zA-Z0-9_-]*',
			        ),
			        'defaults' => array(
				        '__NAMESPACE__' => 'MApp1\Controller',
				        'controller'    => 'Category',
				        'action'        => 'index',
			        ),
		        ),
	        ),
	        'content1' => array(
		        'type'    => 'Segment',
		        'options' => array(
			        'route'    => '/content1[/:allias]',
			        'constraints' => array(
				        'allias' => '[a-zA-Z][a-zA-Z0-9_-]*',
			        ),
			        'defaults' => array(
				        '__NAMESPACE__' => 'MApp1\Controller',
				        'controller'    => 'Content',
				        'action'        => 'index',
			        ),
		        ),
	        ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'ru_RU',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'MApp1\Controller\Index' => 'MApp1\Controller\IndexController',
            'MApp1\Controller\App'   => 'MApp1\Controller\AppController',
            'MApp1\Controller\Content'  => 'MApp1\Controller\ContentController',
            'MApp1\Controller\Category' => 'MApp1\Controller\CategoryController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'm-app/index/index'       => __DIR__ . '/../view/m-app1/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),


);
