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
			'banner' => array(
				'display_name' => 'Banner',
				'description' => 'Banner with a static image.',
				'options' => array(
					'image' => '/{theme_images}/banners/banner0.png',
				),
				'controller' => 'MApp.Controller.Banner',
				'position' => 1,      // from BD
//				'region' => 'footer', // from BD
//				'theme' => 'common',  // from BD
				'id' => 2,            // from BD
			),
			'example' => array(
				'display_name' => 'Example',
				'description' => 'Example widget.',
				'options' =>  array(
					'link' => '<a href="https://clck.yandex.ru/redir/dtype=stred/pid=7/cid=1228/*https://pogoda.yandex.ru/eslov" target="_blank"><img src="//info.weather.yandex.net/eslov/4_white.ru.png?domain=ru" border="0" alt="Яндекс.Погода"/><img width="1" height="1" src="https://clck.yandex.ru/click/dtype=stred/pid=7/cid=1227/*https://img.yandex.ru/i/pix.gif" alt="" border="0"/></a>',
					'opt_1' => 1,
					'opt_2' => 0,
					'opt_3' => 1,
				),
				'controller' => 'MApp.Controller.Example',
				'position' => 1,      // from BD
//				'region' => 'footer', // from BD
//				'theme' => 'common',  // from BD
				'id' => 1,            // from BD
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
				'common' => array(
					// optionally, by default will automatically be calculated as my-theme/template/frontend
					'templates' => 'sc-default/template/common',
					// optionally, by default will automatically be calculated as my-theme/layout/frontend
					'layouts' => 'sc-default/layout/common',
					// optionally, by default 'index'
					'default_layout' => 'index',
					'regions' => array(
						'header' => array(
							'display_name' => 'Header',
							'partial' => 'sc-default/layout/frontend/region/header',
							'contains' => array(
								'banner', 'example'
							),
						),
						'content' => array(
							'display_name' => 'Content',
							'partial' => 'sc-default/layout/frontend/region/content',
							'contains' => array(
								'banner', 'banner'
							),
						),
						'footer' => array(
							'display_name' => 'Footer',
							'partial' => 'sc-default/layout/frontend/region/footer',
							'contains' => array('example'),
						),
					),
				),
			),
		),
	),
);