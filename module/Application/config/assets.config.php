<?php
return array();
return array(
	'assetic_configuration' => array(
		'debug' => true,
		'buildOnRequest' => true,
//		'cacheEnabled' => true,
		'webPath' => realpath(__DIR__ .'/../../../public/assets/'),
		'cachePath' => realpath(__DIR__ . '/../data/cache'),
		'basePath' => 'assets',

		'routes' => array(
			'home' => array(
				'@base_js',
				'@base_css',
			),
		),

		'modules' => array(
			'application' => array(
				'root_path' => __DIR__ . '/../assets',
				'collections' => array(
					'base_css' => array(
						'assets' => array(
							'css/bootstrap-theme.min.css',
							'css/bootstrap.min.css',
							'css/style.css',
						),
						'filters' => array(
							'CssRewriteFilter' => array(
								'name' => 'Assetic\Filter\CssRewriteFilter'
							)
						),
					),

					'base_js' => array(
						'assets' => array(
							'js/bootstrap.min.js',
							'js/jquery.min.js',
//							'js/respond.min.js',
//							'js/html5shiv.min.js',
						)
					),

					'base_images' => array(
						'assets' => array(
							'img/*.png',
							'img/*.ico',
						),
						'options' => array(
							'move_raw' => true,
						)
					),
				),
			),
		),
	),
);
