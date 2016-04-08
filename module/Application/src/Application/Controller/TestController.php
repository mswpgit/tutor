<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TestController extends AbstractActionController
{
    public function indexAction()
    {
	    $menuService = $this->getServiceLocator()->get('menuService');
	    $menuService->render();
	    $menuMapper = $menuService->getMapper();
	    $moduleService = $this->getServiceLocator()->get('moduleService');
	    $moduleMapper = $moduleService->getMapper();

        return new ViewModel();
    }
}
