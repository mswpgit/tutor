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
use Application\Form\CreateProduct;
use Application\Entity\Product;

class FormController extends AbstractActionController
{
	// /route
    public function indexAction()
    {
	    $form = new CreateProduct();
	    $product = new Product();
	    $form->bind($product);

	    $request = $this->getRequest();
	    if ($request->isPost()) {
		    $form->setData($request->getPost());

		    if ($form->isValid()) {
			    var_dump($product);
		    }
	    }

	    return array(
		    'form' => $form,
	    );
    }
}
