<?php
namespace Mod\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\FormInterface;

class IndexController extends AbstractActionController
{
	/**
	 * @var FormInterface
	 */
	protected $menuForm;

	/**
	 * @var FormInterface
	 */
	protected $loginForm;

	public function indexAction()
	{
		// одно вложение
		/** @var $em \Doctrine\ORM\EntityManager */
		$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

		$root_categories = $em->getRepository('Mod\Entity\Category')->findBy(array('parent_category' => null));

		$collection = new \Doctrine\Common\Collections\ArrayCollection($root_categories);
		$category_iterator = new \Mod\Entity\RecursiveCategoryIterator($collection);
		$recursive_iterator = new \RecursiveIteratorIterator($category_iterator, \RecursiveIteratorIterator::SELF_FIRST);
//		foreach ($recursive_iterator as $index => $child_category)
//		{
//\Zend\Debug\Debug::dump($child_category);
////\Zend\Debug\Debug::dump($child_category->getId());
////\Zend\Debug\Debug::dump($child_category->getDepth());
////\Zend\Debug\Debug::dump($child_category->getTitle());
//		}


		$menuService = $this->getServiceLocator()->get('menuService');
		$menuMapper = $menuService->getMapper();

		/** @var $authService \Zend\Authentication\AuthenticationService */
		$authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

		if ($authService->hasIdentity())
		{
//			$menu = new \Mod\Entity\Menu();
//			$item = rand(2, 72);
//			$menu->setMenuType('menu_' . $item);
//			$menu->setTitle('Mеню' . $item);
//			$menu->setDescription('Описание меню ' . $item);
//			$menu->setIsActive(true);

//			$menuMapper->save($menu);
		}

//		\Zend\Debug\Debug::dump($menuMapper->getAll());

		$moduleService = $this->getServiceLocator()->get('moduleService');
		$moduleMapper = $moduleService->getMapper();

		\Zend\Debug\Debug::dump($moduleMapper->getAll());

		return array(
			'recursive_iterator' => $recursive_iterator
		);
	}

	public function menuAction()
	{


		// Zend\Mvc\Controller\Plugin\FlashMessenger
//		\Zend\Debug\Debug::dump($this->flashMessenger()->getNamespace());
//		\Zend\Debug\Debug::dump($this->flashMessenger()->getMessages());
//		\Zend\Debug\Debug::dump($this->flashMessenger()->getInfoMessages());
		$request = $this->getRequest();
		$form    = $this->getMenuForm();
		if ($request->isPost())
		{
//			\Zend\Debug\Debug::dump($request->getPost()); die;
			$form->setData($request->getPost());
			if ($form->isValid())
			{
				$menuService = $this->getServiceLocator()->get('menuService');
				$menuService->createdMenu($request->getPost()->toArray());
				$this->redirect()->toUrl('menu');
			}
		}

		return array(
			'menuForm' => $form
		);

	}

	public function loginAction()
	{
		$request = $this->getRequest();
		$form    = $this->getLoginForm();
		if ($request->isPost())
		{
			$form->setData($request->getPost());
			if ($form->isValid())
			{
				$login = $form->getData();
//admin@admin.com
				$authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
				$adapter = $authService->getAdapter();
				$adapter->setIdentityValue($login['email']);
				$adapter->setCredentialValue($login['password']);
				$authResult = $authService->authenticate();

				if ($authResult->isValid())
				{
					$this->flashMessenger()->addSuccessMessage('login succeded!');

				}
				else
				{
					$this->flashMessenger()->addErrorMessage('login failed!');
				}
//				$menuService = $this->getServiceLocator()->get('loginService');
//				$menuService->createdMenu($request->getPost()->toArray());
//				$this->redirect()->toUrl('menu');
				$this->redirect()->toUrl('/menu/menu');
			}
		}

		return array(
			'loginForm' => $form
		);

	}

	public function getMenuForm()
	{
		if (!$this->menuForm) {
			$this->setMenuForm($this->getServiceLocator()->get('menu_form'));
		}
		return $this->menuForm;
	}

	public function setMenuForm(FormInterface $loginForm)
	{
		$this->menuForm = $loginForm;
		$fm = $this->flashMessenger()->setNamespace('mod-menu-form')->getMessages();
		if (isset($fm[0]))
		{
			$this->menuForm->setMessages(
				array('identity' => array($fm[0]))
			);
		}

		return $this;
	}

	public function getLoginForm()
	{
		if (!$this->loginForm) {
			$this->setLoginForm($this->getServiceLocator()->get('login_form'));
		}
		return $this->loginForm;
	}

	public function setLoginForm(FormInterface $loginForm)
	{
		$this->loginForm = $loginForm;
		$fm = $this->flashMessenger()->setNamespace('mod-login-form')->getMessages();
		if (isset($fm[0]))
		{
			$this->loginForm->setMessages(
				array('identity' => array($fm[0]))
			);
		}

		return $this;
	}



}