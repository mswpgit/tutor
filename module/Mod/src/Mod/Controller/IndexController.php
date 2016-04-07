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

	public function indexAction()
	{
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

		return array();
	}

	public function menuAction()
	{
		$request = $this->getRequest();
		$form    = $this->getMenuForm();
		if ($request->isPost())
		{
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

}