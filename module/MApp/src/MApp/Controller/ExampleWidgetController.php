<?php

namespace MApp\Controller;

use Zend\View\Model\ViewModel;

class ExampleWidgetController extends AbstractWidget
{
	/**
	 * @return ViewModel
	 */
	public function indexAction()
	{
		$view = new ViewModel();
		$view->item = $this->getItem();


		return $view;
	}
}
