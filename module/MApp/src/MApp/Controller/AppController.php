<?php

namespace MApp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AppController extends AbstractActionController
{
    public function indexAction()
    {

	    /** @var $menuService \MBase\Service\MenuService */
	    $menuService = $this->getServiceLocator()->get('menuService');
	    /** @var $menuMapper \MBase\Mapper\MenuMapper */
	    $menuMapper = $menuService->getMapper();

	    /** @var $categoryService \MBase\Service\CategoryService */
	    $categoryService = $this->getServiceLocator()->get('categoryService');
	    /** @var $categoryMapper \MBase\Mapper\CategoryMapper */
	    $categoryMapper = $categoryService->getMapper();

	    /** @var $menuTypeService \MBase\Service\MenuTypeService */
	    $menuTypeService = $this->getServiceLocator()->get('menuTypeService');
	    /** @var $menuTypeMapper \MBase\Mapper\MenuTypeMapper */
	    $menuTypeMapper = $menuTypeService->getMapper();

		/** @var $contentService \MBase\Service\ContentService */
	    $contentService = $this->getServiceLocator()->get('contentService');
	    /** @var $contentMapper \MBase\Mapper\ContentMapper */
	    $contentMapper = $contentService->getMapper();

        return new ViewModel(
	        array(
		        'recursive_category_iterator' => $categoryService->getRecursiveIterator(),
		        'recursive_menu_iterator'     => $menuService->getRecursiveIterator(),
	        )
        );
    }
}
