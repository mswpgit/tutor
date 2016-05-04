<?php

namespace Back\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MaterialController extends AbstractActionController
{
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

}
