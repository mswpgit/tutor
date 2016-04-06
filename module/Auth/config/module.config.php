<?php

return array(
    
    'doctrine' => array(
        'driver' => array(
            'Auth_Entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Auth/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Auth\Entity' => 'Auth_Entities'
                ),
            ),
        ),
        
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Auth\Entity\User',
                'identity_property' => 'email',
                'credential_property' => 'password',
                'credential_callable' => function(\Auth\Entity\User $user, $passwordGiven) {
                    // using Bcrypt 
                    $bcrypt   = new \Zend\Crypt\Password\Bcrypt();
                    $bcrypt->setSalt('m3s3Cr3tS4lty34h');

                    // $passwordGiven is unhashed password that inputted by user
                    // $user->getPassword() is hashed password that saved in db
                    return $bcrypt->verify($passwordGiven, $user->getPassword());
                },
            ),
        ),
    ),
    
    'doctrine_factories' => array(
        'authenticationadapter' => 'Auth\Factory\Authentication\AdapterFactory',
    ),
    
    'service_manager' => array(
        'factories' => array(
            'Zend\Authentication\AuthenticationService' => function($serviceManager) {
                return $serviceManager->get('doctrine.authenticationservice.orm_default');
            }
        )  
    ),
    
    'controllers' => array(
        'factories' => array(
            'Auth\Controller\Auth' => function($controller) {
                $authController = new \Auth\Controller\AuthController($controller->getServiceLocator()->get('Zend\Authentication\AuthenticationService'));
                return $authController;
            },
        ),
    ),
    
    
    'router' => array(
        'routes' => array(
            'auth' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/auth',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Auth\Controller',
                        'controller'    => 'Auth',
                        'action'        => 'login',
                    ),
                ),
            ),
	        'test' => array(
		        'type'    => 'Literal',
		        'options' => array(
			        'route'    => '/test',
			        'defaults' => array(
				        '__NAMESPACE__' => 'Auth\Controller',
				        'controller'    => 'Auth',
				        'action'        => 'test',
			        ),
		        ),
	        ),
	        'logout' => array(
		        'type'    => 'Literal',
		        'options' => array(
			        'route'    => '/logout',
			        'defaults' => array(
				        '__NAMESPACE__' => 'Auth\Controller',
				        'controller'    => 'Auth',
				        'action'        => 'logout',
			        ),
		        ),
	        ),
        ),
    ),
);