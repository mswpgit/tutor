<?php

namespace MApp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\FormInterface;

class AppController extends AbstractActionController
{
	/**
	 * @var FormInterface
	 */
	protected $contentForm;


    public function indexAction()
    {
	    $request = $this->getRequest();
	    $form    = $this->getContentForm();
	    if ($request->isPost())
	    {
		    $form->setData($request->getPost());

		    if (!$form->isValid())
		    {
			    \Zend\Debug\Debug::dump($form->getData());
		    }
	    }

	    $vm = new ViewModel(array(
		    'menuForm' => $form
	    ));

	    $vm->setTemplate('m-base/form/content');



	    return $vm;








//
//	    /** @var $menuService \MBase\Service\MenuService */
//	    $menuService = $this->getServiceLocator()->get('menuService');
//	    /** @var $menuMapper \MBase\Mapper\MenuMapper */
//	    $menuMapper = $menuService->getMapper();
//
//	    /** @var $categoryService \MBase\Service\CategoryService */
//	    $categoryService = $this->getServiceLocator()->get('categoryService');
//	    /** @var $categoryMapper \MBase\Mapper\CategoryMapper */
//	    $categoryMapper = $categoryService->getMapper();
//
//	    /** @var $menuTypeService \MBase\Service\MenuTypeService */
//	    $menuTypeService = $this->getServiceLocator()->get('menuTypeService');
//	    /** @var $menuTypeMapper \MBase\Mapper\MenuTypeMapper */
//	    $menuTypeMapper = $menuTypeService->getMapper();
//
//		/** @var $contentService \MBase\Service\ContentService */
//	    $contentService = $this->getServiceLocator()->get('contentService');
//	    /** @var $contentMapper \MBase\Mapper\ContentMapper */
//	    $contentMapper = $contentService->getMapper();
//
//        return new ViewModel(
//	        array(
//		        'recursive_category_iterator' => $categoryService->getRecursiveIterator(),
//		        'recursive_menu_iterator'     => $menuService->getRecursiveIterator(),
//	        )
//        );
    }

	public function getContentForm()
	{
		if (!$this->contentForm) {
			$this->setContentForm($this->getServiceLocator()->get('contentForm'));
		}
		return $this->contentForm;
	}

	public function setContentForm(FormInterface $contentForm)
	{
		$this->contentForm = $contentForm;
		$fm = $this->flashMessenger()->setNamespace('mbase-content-form')->getMessages();
		if (isset($fm[0]))
		{
			$this->contentForm->setMessages(
				array('identity' => array($fm[0]))
			);
		}

		return $this;
	}

}
