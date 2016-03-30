<?php
namespace ModForm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class CategoryController extends AbstractActionController
{
	protected $em;
	protected $entity;
	protected $controller;
	protected $route;
	protected $service;
	protected $form;

	function __construct()
	{
		$this->form = 'ModForm\Form\CategoryForm';
		$this->controller = 'categoria';
		$this->route = 'categoria/default';
		$this->service = 'ModForm\Service\CategoriaService';
		$this->entity = 'ModForm\Entity\Category';
	}

	public function indexAction()
	{
		$list = $this->getEm()->getRepository($this->entity)->findAll();

		$page = $this->params()->fromRoute('page');

		$paginator = new Paginator(new ArrayAdapter($list));
		$paginator->setCurrentPageNumber($page)
			->setDefaultItemCountPerPage(10);

		if ($this->flashMessenger()->hasSuccessMessages()){
			return new ViewModel(array(
				'data' => $paginator, 'page' => $page,
				'success' => $this->flashMessenger()->getSuccessMessages()));
		}

		if ($this->flashMessenger()->hasErrorMessages()){
			return new ViewModel(array(
				'data' => $paginator, 'page' => $page,
				'error' => $this->flashMessenger()->getErrorMessages()));
		}


		return new ViewModel(array('data' => $paginator, 'page' => $page));

		return array();
	}

	public function addAction()
	{
		return array();
	}

	public function editAction()
	{
		return array();
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