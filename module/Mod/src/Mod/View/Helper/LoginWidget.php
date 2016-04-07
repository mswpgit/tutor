<?php

namespace Mod\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Mod\Form\Login as LoginForm;
use Zend\View\Model\ViewModel;

class LoginWidget extends AbstractHelper
{
	/**
	 * Login Form
	 * @var LoginForm
	 */
	protected $loginForm;

	protected $serviceLocator;

	/**
	 * $var string template used for view
	 */
	protected $viewTemplate;
	/**
	 * __invoke
	 *
	 * @access public
	 * @param array $options array of options
	 * @return string
	 */
	public function __invoke($options = array())
	{
		/** @var $authService \Zend\Authentication\AuthenticationService */
		$authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

		if (!$authService->hasIdentity())
		{
			if (array_key_exists('render', $options))
			{
				$render = $options['render'];
			}
			else
			{
				$render = true;
			}

			$vm = new ViewModel(array(
				'loginForm' => $this->getLoginForm()
			));

			$vm->setTemplate($this->viewTemplate);

			if ($render)
			{
				return $this->getView()->render($vm);
			}
			else
			{
				return $vm;
			}
		}
		else
		{
			/** @var $identity \Auth\Entity\User */
			$identity = $authService->getIdentity();

			echo $identity->getName() . ' | ' . $identity->getEmail() . '<br>';
			echo '<a href="/logout">Выйти</a>';
//			\Zend\Debug\Debug::dump($user);
		}

	}

	/**
	 * Retrieve Login Form Object
	 * @return LoginForm
	 */
	public function getLoginForm()
	{
		return $this->loginForm;
	}

	/**
	 * Inject Login Form Object
	 * @param LoginForm $loginForm
	 * @return LoginWidget
	 */
	public function setLoginForm(LoginForm $loginForm)
	{
		$this->loginForm = $loginForm;
		return $this;
	}

	/**
	 * @param string $viewTemplate
	 * @return LoginWidget
	 */
	public function setViewTemplate($viewTemplate)
	{
		$this->viewTemplate = $viewTemplate;
		return $this;
	}

	public function setServiceLocator($serviceLocator)
	{
		$this->serviceLocator = $serviceLocator;
	}

	public function getServiceLocator()
	{
		return $this->serviceLocator;
	}

}
