<?php
namespace EntityMod\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$catService = $this->getServiceLocator()->get('catService');
		$catServiceMapper = $catService->getMapper();

		$cat = $catService->getItemById(2);
		$cat->setString('Строка1');
		$catServiceMapper->save($cat);
		$cat = $catServiceMapper->getItemById(2);
		\Zend\Debug\Debug::dump($cat); die;

		return array();
	}

}