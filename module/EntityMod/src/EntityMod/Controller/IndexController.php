<?php
namespace EntityMod\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$catService = $this->getServiceLocator()->get('catService');
		$catServiceMapper = $catService->getMapper();

		\Zend\Debug\Debug::dump($catServiceMapper->getAll()); die;

		return array();
	}

}