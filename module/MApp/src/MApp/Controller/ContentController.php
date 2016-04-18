<?php

namespace MApp\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContentController extends AbstractActionController
{
    public function indexAction()
    {
	    $content = '';

	    if ($this->params()->fromRoute('allias'))
	    {
		    /** @var $contentService \MBase\Service\ContentService */
		    $contentService = $this->getServiceLocator()->get('contentService');

		    $content = $contentService->getMapper()->getContentByAlias($this->params()->fromRoute('allias'));

	    }

	    if (!$content)
	    {
		    $this->notFoundAction();
	    }

        return new ViewModel(
	        array(
		        'content' => $content
	        )
        );
    }

}
