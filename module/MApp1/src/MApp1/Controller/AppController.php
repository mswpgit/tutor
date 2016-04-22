<?php

namespace MApp1\Controller;

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
