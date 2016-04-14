<?php

namespace MApp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
	    /** @var $http \Zend\Uri\Http */
	    $http = $this->getRequest()->getUri();

	    /** @var $menuService \MBase\Service\MenuService */
	    $menuService = $this->getServiceLocator()->get('menuService');

	    /** @var $menu \MBase\Entity\Menu */
	    if ($http->getPath() == '/')
	    {
		    $menu = $menuService->getMenuIsDefault();
	    }
	    else if ($http->getPath())
	    {
		    $menu = $menuService->getMenuByPath($http->getPath());
	    }

	    if ($menu)
	    {
		    if ($menu->getType() == 'content')
		    {
			    /** @var $contentService \MBase\Service\ContentService */
			    $contentService = $this->getServiceLocator()->get('contentService');

			    $viewContent = $contentService->viewRender($menu->getLink());

			    return $viewContent;
		    }
	    }

//	     $this->notFoundAction();

	    $this->getResponse()->setStatusCode(404);
	    return;

//        return new ViewModel();
    }
}
