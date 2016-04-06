<?php

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\AuthenticationService;

class AuthController extends AbstractActionController
{
    protected $authService;
   
    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
    }

	public function testAction()
	{
		$authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

		\Zend\Debug\Debug::dump($authService->hasIdentity());
		die('test');
	}

    public function loginAction()
    {
        //you can grab this data from the Form in real life app
        $data['login'] = 'admin@admin.com'; 
        $data['password'] = 'admin';
        
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

        $adapter = $authService->getAdapter();
        $adapter->setIdentityValue($data['login']);
        $adapter->setCredentialValue($data['password']);
        $authResult = $authService->authenticate();






    
        if ($authResult->isValid())
        {
            echo 'login succeded';
        }
        else
        {
            echo 'login failed';
        }
        
        die;

    }

	public function logoutAction()
	{
		/** @var $authService \Zend\Authentication\AuthenticationService */
		$authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

		if ($authService->hasIdentity())
		{
			$authService->clearIdentity();
			if (!$authService->hasIdentity())
			{
				echo 'Почистили!';
			}
		}



		die;

	}
}
