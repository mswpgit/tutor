<?php

namespace MApp1\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoryController extends AbstractActionController
{
    public function indexAction()
    {
	    $category = '';

	    if ($this->params()->fromRoute('allias'))
	    {
		    /** @var $categoryService \MBase\Service\CategoryService */
		    $categoryService = $this->getServiceLocator()->get('categoryService');

		    $category = $categoryService->getMapper()->getCategoryByAlias($this->params()->fromRoute('allias'));

	    }

	    if (!$category)
	    {
		    $this->notFoundAction();
	    }

	    return new ViewModel(
		    array(
			    'category' => $category
		    )
	    );
    }

}
