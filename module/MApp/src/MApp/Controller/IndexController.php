<?php

namespace MApp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	protected $link = '';

    public function indexAction()
    {
	    /** @var $http \Zend\Uri\Http */
	    $http = $this->getRequest()->getUri();

	    $view = '';

	    if ($http->getPath())
	    {
		    $path = $http->getPath();
	    }

	    /** @var $menuService \MBase\Service\MenuService */
	    $menuService = $this->getServiceLocator()->get('menuService');


	    /** @var $menu \MBase\Entity\Menu */
	    if (!$path)
	    {
		    $menu = $menuService->getMenuIsDefault();
	    }
	    else
	    {
		    $menu = $menuService->getMenuByPath($path);
	    }

	    if ($menu)
	    {
		    $link = $menu->getLink();

			if ($menu->getType() == 'content')
			{
				$id = substr($link, 8);
				$view = $this->viewContent($id);
			}

		    if ($menu->getType() == 'category')
		    {
			    $id = substr($link, 9);
			    $view = $this->viewCategory($id);
		    }
	    }
	    else
	    {
		    $this->link = $path;
		    /** @var $categoryService \MBase\Service\CategoryService */
		    $categoryService = $this->getServiceLocator()->get('categoryService');
		    $category = $categoryService->getByPath($path);

		    if ($category)
		    {
			    $view = $this->viewCategory($category->getId());
		    }
	    }


	    if ($view)
	    {
	        return $view;
	    }

//	     $this->notFoundAction();

	    $this->getResponse()->setStatusCode(404);
	    return;

//        return new ViewModel();
    }


	public function viewContent($id)
	{
		/** @var $contentService \MBase\Service\ContentService */
		$contentService = $this->getServiceLocator()->get('contentService');

		$viewContent = $contentService->viewRender($id);

		return $viewContent;
	}

	public function viewCategory($id)
	{
		/** @var $categoryService \MBase\Service\CategoryService */
		$categoryService = $this->getServiceLocator()->get('categoryService');

		$viewCategory = $categoryService->viewRender($id);

		return $viewCategory;
	}

}
