<?php

namespace MBase;

return array(
	'view_manager' => array(
		'template_map' => array(
			'm-base/view_category' => __DIR__ . '/../view/m-base/templates/view_category.phtml',
			'm-base/view_content'  => __DIR__ . '/../view/m-base/templates/view_content.phtml',
			'm-base/menu'          => __DIR__ . '/../view/m-base/templates/menu.phtml',
			'm-base/form/content'  => __DIR__ . '/../view/m-base/templates/form/content.phtml',
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
	'sc' => array(
		/* Why these 'sc' options here? Why not 'config/autoload'?
		 *
		 * If the module is disabled, these options will not be present in the
		 * global configuration. It is important, because uses
		 * both the database and configuration.
		 * Take this into consideration when writing a "theme module".
		 */
		'widgets' => array(
			'content' => array(
				'display_name' => 'Content',
				'description' => 'Editable content. For editing use the content manager.',
				'options' => array(
					'immutable' => true,
					'unique' => true,
				),
			),
		),
		'themes' => array(
			'sc-default' => array(
				// Your theme can provide only frontend templates and layouts.
				'provides_backend' => true,

				'display_name' => 'ScContent Default',
				'description'  => 'The default theme with several regions.',
				'theme_images' => '/sc-default/img',
				'screenshot'   => 'sc-default/img/theme.png',
				'access_denied_template' => 'sc-default/template/frontend/user/deny',
				'errors' => array(
					/* You can use different layouts for frontend errors and
					 * backend errors, simply use the placeholder {side}:
					 * 'my-theme/layout/error/{side}'
					 */
					'layout' => 'sc-default/layout/frontend/index',

					/* You can use different templates for frontend errors and
					 * backend errors, simply use the placeholder {side}:
					* 'my-theme/template/error/{side}/index'
					* 'my-theme/template/error/{side}/404'
					*/
					'template' => array(
						'exception' => 'sc-default/template/error/index',
						'404'       => 'sc-default/template/error/404',
					),
				),
				/* Frontend
				 */
				'frontend' => array(
					// optionally, by default will automatically be calculated as my-theme/template/frontend
					'templates' => 'sc-default/template/frontend',
					// optionally, by default will automatically be calculated as my-theme/layout/frontend
					'layouts' => 'sc-default/layout/frontend',
					// optionally, by default 'index'
					'default_layout' => 'index',
					'regions' => array(
						'header' => array(
							'display_name' => 'Header',
							'partial' => 'sc-default/layout/frontend/region/header',
							'contains' => array(
								'site_title', 'banner', 'search'
							),
						),
						'content_top' => array(
							'display_name' => 'Content Top',
							'partial' => 'sc-default/layout/frontend/region/content-top',
							'contains' => array(
							),
						),
						'content_middle' => array(
							'display_name' => 'Content Middle',
							'partial' => 'sc-default/layout/frontend/region/content-middle',
							'contains' => array(
								'content'
							),
						),
						'content_bottom' => array(
							'display_name' => 'Content Bottom',
							'partial' => 'sc-default/layout/frontend/region/content-bottom'
						),
						'aside' => array(
							'display_name' => 'Aside',
							'partial' => 'sc-default/layout/frontend/region/aside',
							'contains' => array(
								'example',
								'login',
							),
						),
						'footer' => array(
							'display_name' => 'Footer',
							'partial' => 'sc-default/layout/frontend/region/footer',
							'contains' => array(),
						),
					),
				),
			),
		),
	),
//
//	'sc1' => array(
//		/* File types catalog class
//		 */
//		'file_types_catalog_class' => 'ScContent\Service\FileTypesCatalog',
//
//		/* Backend entities
//		 */
//		'entity_back_category_class' => 'ScContent\Entity\Back\Category',
//		'entity_back_article_class'  => 'ScContent\Entity\Back\Article',
//		'entity_back_file_class'     => 'ScContent\Entity\Back\File',
//
//		'themes' => array(
//			'sc-default' => array(
//				'display_name' => 'ScContent Default',
//				'screenshot' => 'sc-default/img/theme.png',
//				'description' => 'The default theme with several regions.',
//
//				/* Frontend
//				 */
//				'frontend' => array(
//					'layout' => 'sc-default-front-layout',
//					'regions' => array(
//						'header' => array(
//							'display_name' => 'Header',
//							'template' => 'sc-default-front-region-header',
//							'contains' => array(
//
//							),
//						),
//						'content_top' => array(
//							'display_name' => 'Content Top',
//							'template' => 'sc-default-front-region-content-top',
//							'contains' => array(
//
//							),
//						),
//						'content_middle' => array(
//							'display_name' => 'Content Middle',
//							'template' => 'sc-default-front-region-content-middle',
//							'contains' => array(
//								'content',
//							),
//						),
//						'content_bottom' => array(
//							'display_name' => 'Content Bottom',
//							'template' => 'sc-default-front-region-content-bottom',
//						),
//						'aside_first' => array(
//							'display_name' => 'Aside First',
//							'template' => 'sc-default-front-region-aside-first',
//							'contains' => array(
//								'login',
//							),
//						),
//						'aside_second' => array(
//							'display_name' => 'Aside Second',
//							'template' => 'sc-default-front-region-aside-second',
//							'contains' => array(
//
//							),
//						),
//						'footer' => array(
//							'display_name' => 'Footer',
//							'template' => 'sc-default-front-region-footer',
//							'contains' => array(
//
//							),
//						)
//					),
//				),
//			),
//		),
//		'widgets' => array(
////			'login' => array(
////				'display_name' => 'Login',
////				'description'  => 'Login widget.',
////				'frontend'   => array(
////					'controller' => 'sc-controller.front.widget.login',
////					'action' => 'index',
////				),
////			),
//			'test_1' => array(
//				'display_name' => 'Test 1',
//			),
//			'test_2' => array(
//				'display_name' => 'Test 2',
//			),
//			'test_3' => array(
//				'display_name' => 'Test 3',
//			),
//		),
////		'db' => array(
////			'driver' => 'pdo',
////			'dsn' => 'mysql:dbname=dbname;host=localhost',
////			'username' => 'username',
////			'password' => 'password',
////			'driver_options' => array(
////				Pdo::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
////			)
////		),
//	),

);