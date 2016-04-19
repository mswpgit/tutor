<?php

namespace MApp;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'MBase\Router\Content',//'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'MApp\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'app' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/app',
                    'defaults' => array(
                        '__NAMESPACE__' => 'MApp\Controller',
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
	        'category' => array(
		        'type'    => 'Segment',
		        'options' => array(
			        'route'    => '/category[/:allias]',
			        'constraints' => array(
				        'allias' => '[a-zA-Z][a-zA-Z0-9_-]*',
			        ),
			        'defaults' => array(
				        '__NAMESPACE__' => 'MApp\Controller',
				        'controller'    => 'Category',
				        'action'        => 'index',
			        ),
		        ),
	        ),
	        'content' => array(
		        'type'    => 'Segment',
		        'options' => array(
			        'route'    => '/content[/:allias]',
			        'constraints' => array(
				        'allias' => '[a-zA-Z][a-zA-Z0-9_-]*',
			        ),
			        'defaults' => array(
				        '__NAMESPACE__' => 'MApp\Controller',
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
            'MApp\Controller\Index' => 'MApp\Controller\IndexController',
            'MApp\Controller\App'   => 'MApp\Controller\AppController',
            'MApp\Controller\Content'  => 'MApp\Controller\ContentController',
            'MApp\Controller\Category' => 'MApp\Controller\CategoryController',
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
            'm-app/index/index'       => __DIR__ . '/../view/m-app/index/index.phtml',
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
	'view_helpers'       => array(
		'invokables' => array(
			'panel'          => 'MApp\View\Helper\Panel',
//			'tag'            => 'MamuzBlog\View\Helper\Tag',
			'catAnchor'      => 'MApp\View\Helper\CatAnchor',
//			'permaLinkPost'  => 'MamuzBlog\View\Helper\PermaLinkPost',
//			'permaLinkTag'   => 'MamuzBlog\View\Helper\PermaLinkTag',
			'contentMeta'    => 'MApp\View\Helper\ContentMeta',
			'contentPanel'   => 'MApp\View\Helper\ContentPanel',
//			'postPanelShort' => 'MamuzBlog\View\Helper\PostPanelShort',
		),
		'factories'  => array(
//			'anchor'         => 'MamuzBlog\View\Helper\AnchorFactory',
//			'anchorBookmark' => 'MamuzBlog\View\Helper\AnchorBookmarkFactory',
//			'hashId'         => 'MamuzBlog\View\Helper\HashIdFactory',
//			'postPager'      => 'MamuzBlog\View\Helper\PostPagerFactory',
//			'tagPager'       => 'MamuzBlog\View\Helper\TagPagerFactory',
//			'tagList'        => 'MamuzBlog\View\Helper\TagListFactory',
//			'slugify'        => 'MamuzBlog\View\Helper\SlugFactory',
		),
	),

);
