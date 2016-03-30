<?php
namespace ModForm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class PageController extends AbstractActionController
{
	protected $em;
	protected $entity;
	protected $controller;
	protected $route;
	protected $service;
	protected $form;

	function __construct()
	{
		$this->form = 'ModForm\Form\PageForm';
		$this->controller = 'page';
		$this->route = 'page/default';
		$this->service = 'ModForm\Service\PageService';
		$this->entity = 'ModForm\Entity\Page';
	}

	public function indexAction()
	{
		if($this->getRequest()->isPost())
		{
			$data = $this->getRequest()->getPost()->toArray();

			foreach($data['post'] as $id)
			{
				$entity = $this->getEm()->getRepository($this->entity)->find($id);
				$this->getEm()->remove($entity);
			}

			$this->getEm()->flush();

			$this->flashMessenger()->addSuccessMessage('Removido com sucesso!');
			return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
		}

		$list = $this->getEm()->getRepository($this->entity)->findAll();

		$page = $this->params()->fromRoute('page');

		$paginator = new Paginator(new ArrayAdapter($list));
		$paginator->setCurrentPageNumber($page)
			->setDefaultItemCountPerPage(10);

		if ($this->flashMessenger()->hasSuccessMessages())
		{
			return new ViewModel(array(
				'data' => $paginator, 'page' => $page,
				'success' => $this->flashMessenger()->getSuccessMessages()));
		}

		if ($this->flashMessenger()->hasErrorMessages())
		{
			return new ViewModel(array(
				'data' => $paginator, 'page' => $page,
				'error' => $this->flashMessenger()->getErrorMessages()));
		}

		return new ViewModel(array('data' => $paginator, 'page' => $page));
	}

	public function addAction()
	{
		$this->form = $this->getServiceLocator()->get($this->form);

		if (is_string($this->form))
		{
			$form = new $this->form;
		}
		else
		{
			$form = $this->form;
		}

		$request = $this->getRequest();

		if ($request->isPost())
		{

			$form->setData($request->getPost());

			if ($form->isValid())
			{

				$service = $this->getServiceLocator()->get($this->service);

				if ($service->save($request->getPost()->toArray()))
				{
					$this->flashMessenger()->addSuccessMessage('Добавлено!');
				}
				else
				{
					$this->flashMessenger()->addErrorMessage('Не удалось записать в БД! Попробуйте ещ1.');
				}

				return $this->redirect()
					->toRoute($this->route, array('controller' => $this->controller, 'action' => 'edit'));
			}
		}

		if ($this->flashMessenger()->hasSuccessMessages()){
			return new ViewModel(array(
				'form' => $form,
				'success' => $this->flashMessenger()->getSuccessMessages()));
		}

		if ($this->flashMessenger()->hasErrorMessages()){
			return new ViewModel(array(
				'form' => $form,
				'error' => $this->flashMessenger()->getErrorMessages()));
		}

		$this->flashMessenger()->clearMessages();

		return new ViewModel(array('form' => $form));
	}

	public function editAction()
	{
		return array();
	}

	public function deleteAction()
	{
		die('DELETE');
	}

	/**
	 * @return \Doctrine\ORM\EntityManager
	 */
	public function getEm()
	{
		if ($this->em == null)
		{
			$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		}

		return $this->em;
	}
}