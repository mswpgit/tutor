<?php

namespace Back\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\FormInterface;
use Zend\Stdlib\Hydrator;

class MaterialController extends AbstractActionController
{
	/**
	 * @var FormInterface
	 */
	protected $materialForm;

	/**
	 * @var Hydrator\ClassMethods
	 */
	protected $formHydrator;

	public function indexAction()
	{
		/** @var $materialService \Content\Service\MaterialService */
		$materialService = $this->getServiceLocator()->get('materialService');

		$materialList = $materialService->getMaterialAll();

		return new ViewModel(
			array(
				'materialList' => $materialList,
			)
		);
	}

	public function createAction()
	{
		$request      = $this->getRequest();
		$materialForm = $this->getMaterialForm();

		if ($request->isPost()) {
			if ($materialForm->setData($request->getPost())->isValid())
			{
				$materialData = $materialForm->getData();
				/** @var $materialService \Content\Service\MaterialService */
				$materialService = $this->getServiceLocator()->get('materialService');
				$material = $materialService->create($materialData);

				\Zend\Debug\Debug::dump($material->getId());// die;

			}
		}

		return new ViewModel(
			array(
				'materialForm' => $materialForm
			)
		);
	}

	public function updateAction()
	{
//		$id = $this->params('id');
//
//		\Zend\Debug\Debug::dump($id);die;
//
//		$request      = $this->getRequest();
//		$materialForm = $this->getMaterialForm();
//		/** @var $materialService \Content\Service\MaterialService */
//		$materialService = $this->getServiceLocator()->get('materialService');
//
//
//		if ($request->isPost()) {
//			if ($materialForm->setData($request->getPost())->isValid())
//			{
//				$materialData = $materialForm->getData();
//
////				$material = $materialService->create($materialData);
//
////				\Zend\Debug\Debug::dump($material->getId());// die;
//
//			}
//		}

//		return new ViewModel(
//			array(
//				'materialForm' => $materialForm
//			)
//		);
	}


	public function getMaterialForm()
	{
		if (!$this->materialForm)
		{
			$this->setMaterialForm($this->getServiceLocator()->get('materialForm'));
		}

		return $this->materialForm;
	}

	public function setMaterialForm(FormInterface $contentForm)
	{
		$this->materialForm = $contentForm;

		$fm = $this->flashMessenger()->setNamespace('back-material-form')->getMessages();

		if (isset($fm[0]))
		{
			$this->materialForm->setMessages(
				array('identity' => array($fm[0]))
			);
		}

		return $this;
	}

	/**
	 * Return the Form Hydrator
	 *
	 * @return \Zend\Stdlib\Hydrator\ClassMethods
	 */
	public function getFormHydrator()
	{
		if (!$this->formHydrator instanceof Hydrator\HydratorInterface)
		{
//			\Zend\Debug\Debug::dump($this->getServiceLocator());die;
			$this->setFormHydrator($this->getServiceLocator()->get('form_hydrator'));
		}

		return $this->formHydrator;
	}

	/**
	 * Set the Form Hydrator to use
	 *
	 * @param Hydrator\HydratorInterface $formHydrator
	 * @return $this
	 */
	public function setFormHydrator(Hydrator\HydratorInterface $formHydrator)
	{
		$this->formHydrator = $formHydrator;
		return $this;
	}

}
